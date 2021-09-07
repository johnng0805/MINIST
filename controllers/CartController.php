<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\CartItem;

define("CART_PATH", "/cart");
define("CART_VIEW", "cart");

class CartController extends Controller
{
    public function cart()
    {
        return $this->render("cart");
    }

    public function addToCart(Request $request, Response $response)
    {
        $cartItem = new CartItem();
        $cartID = Application::$app->session->getInt("cartID");

        if ($request->isPost()) {
            $cartItem->loadData($request->getBody());
            $cartItem->setCartID($cartID);

            $sql = [
                $cartItem::cartIDKey() => $cartItem->cart_id,
                $cartItem::productIDKey() => $cartItem->product_id
            ];

            $itemAdded = $cartItem->findOne($sql);

            if (!$itemAdded) {
                $quantity = 1;
                $cartItem->setQuantity($quantity);

                if ($cartItem->validate()) {
                    if ($cartItem->save()) {
                        $response->redirect(CART_PATH);
                    } else {
                        return http_response_code(500);
                    }
                } else {
                    return http_response_code(400);
                }
            } else {
                if ($cartItem->quantity == 0) {
                    $newQuantity = $itemAdded->quantity + 1;
                    $cartItem->update(["quantity" => $newQuantity], $sql);
                    $response->redirect(CART_PATH);
                }
            }
        } else {
            $cartItems = $cartItem->getByID([$cartItem::cartIDKey() => $cartID]);
            $params = [
                "cartItems" => $cartItems
            ];
            return $this->render(CART_VIEW, $params);
        }
    }

    public function getCartItems()
    {
        $cartItem = new CartItem();
        $cartID = Application::$app->session->getInt("cartID");

        $items = $cartItem->getByID([$cartItem::cartIDKey() => $cartID]);

        if ($items) {
            return json_encode($items);
        } else {
            return http_response_code(500);
        }
    }

    public function removeCartItem(Request $request)
    {
        $cartItem = new CartItem();
        if ($request->isDelete()) {
            $itemID = $_REQUEST["id"];
            $cartItem->deleteByID(["id" => $itemID]);
        }
    }
}

<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\CartItem;

class CartController extends Controller
{
    public function cart()
    {
        return $this->render("cart");
    }

    public function addToCart(Request $request, Response $response)
    {
        $cartItem = new CartItem();

        if ($request->isPost()) {
            $cartItem->loadData($request->getBody());
            $cartItem->setCartID($_SESSION["cartID"]);

            $sql = [
                "cart_id" => $cartItem->cart_id,
                "product_id" => $cartItem->product_id
            ];

            $itemAdded = $cartItem->findOne($sql);

            if (!$itemAdded) {
                $quantity = 1;
                $cartItem->setQuantity($quantity);

                if ($cartItem->validate() && $cartItem->save()) {
                    $response->redirect("/cart");
                }
            } else {
                if ($cartItem->quantity == 0) {
                    $newQuantity = $itemAdded->quantity + 1;
                    $cartItem->update(["quantity" => $newQuantity], $sql);
                    $response->redirect("/cart");
                }
            }
        } else {
            $cartItems = $cartItem->getByID(["cart_id" => $_SESSION["cartID"]]);
            $params = [
                "cartItems" => $cartItems
            ];
            return $this->render("cart", $params);
        }
    }

    public function getCartItems(Request $request, Response $response)
    {
        $cartItem = new CartItem();

        $items = $cartItem->getByID(["cart_id" => $_SESSION["cartID"]]);
        $items = json_encode($items);

        return $items;
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

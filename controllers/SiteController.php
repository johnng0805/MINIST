<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CartItem;
use app\models\PdImage;
use app\models\Product;
use app\models\User;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->setLayout('main');
    }

    public function home()
    {
        $params = [
            'name' => 'John Nguyen'
        ];
        return $this->render('home', $params);
    }

    public function test()
    {
        $product = new Product();
        $result = $product->getAll();
        echo json_encode($result);
    }

    public function image()
    {
        $productImage = new PdImage();
        $result = $productImage->getByID(["product_id" => $_GET["id"]]);
        echo json_encode($result);
    }

    public function product()
    {
        $product = new Product();
        $productImage = new PdImage();

        $productInfo = $product->getById(["id" => $_GET["id"]]);
        $productImages = $productImage->getByID(["product_id" => $_GET["id"]]);

        $params = [
            'product' => $productInfo,
            'image' => $productImages
        ];

        return $this->render('product', $params);
    }

    public function cart(Request $request, Response $response)
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
}

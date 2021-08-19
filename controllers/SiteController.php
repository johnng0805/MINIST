<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\PdImage;
use app\models\Product;

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

    public function cart()
    {
        return $this->render('cart');
    }
}

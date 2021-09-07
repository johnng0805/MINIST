<?php

namespace app\controllers;

use app\core\Controller;
use app\core\exception\BadRequestException;
use app\core\exception\NotFoundException;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CartItem;
use app\models\ProductImage;
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

    public function getAllProducts()
    {
        $product = new Product();
        $result = $product::getAll();
        return json_encode($result);
    }

    public function image()
    {
        $productImage = new ProductImage();
        $imageID = $_GET["id"];

        if ($imageID) {
            $result = $productImage->getByID(["product_id" => $imageID]);

            if ($result) {
                return json_encode($result);
            } else {
                return http_response_code(404);
            }
        }
    }

    public function product(Request $request, Response $response)
    {
        $product = new Product();
        $productImage = new ProductImage();

        if ($_GET["id"]) {
            $id = $_GET["id"];
            $productInfo = $product->getByID([$product::primaryKey() => $id]);
            $productImages = $productImage->getByID([$productImage::productIDKey() => $id]);

            $params = [
                'product' => $productInfo,
                'image' => $productImages
            ];

            return $this->render('product', $params);
        } else {
            throw new BadRequestException();
        }
    }

    public function getProductInfo()
    {
        $product = new Product();

        if ($_GET["id"]) {
            $productInfo = $product->getByID(["id" => $_GET["id"]]);

            if ($productInfo) {
                return json_encode($productInfo);
            } else {
                return http_response_code(404);
            }
        }
    }

    public function getProductImg()
    {
        $productImg = new ProductImage();

        if ($_GET["product_id"]) {
            $productImgs = $productImg->getByID(["product_id" => $_GET["product_id"]]);

            if ($productImgs) {
                return json_encode($productImgs);
            } else {
                return http_response_code(404);
            }
        }
    }
}

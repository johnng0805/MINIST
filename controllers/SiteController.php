<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
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
}

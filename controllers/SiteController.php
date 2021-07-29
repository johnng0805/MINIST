<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;

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
        var_dump($_GET);
    }
}

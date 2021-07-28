<?php

namespace app\controllers;

use app\core\Controller;

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
}

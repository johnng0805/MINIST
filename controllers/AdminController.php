<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout('admin');
    }

    public function dashboard()
    {
        # code...
    }

    public function store()
    {
        return $this->render('store');
    }
}

<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        if ($request->isPost()) {
            return "Submitted login";
        }

        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request, Response $response)
    {
        if ($request->isPost()) {
            echo '<pre>';
            var_dump($request->getBody());
            echo '</pre>';
            exit();
            return "Submitted register";
        }

        $this->setLayout("auth");
        return $this->render('register');
    }
}

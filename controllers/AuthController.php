<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\UserLogin;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setLayout('auth');
    }

    public function login(Request $request, Response $response)
    {
        $userLogin = new UserLogin();

        if ($request->isPost()) {
            $userLogin->loadData($request->getBody());

            if ($userLogin->validate() && $userLogin->login()) {
                $response->redirect('/');
                return;
            }
        }

        return $this->render('login', [
            'model' => $userLogin
        ]);
    }

    public function register(Request $request, Response $response)
    {
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->response->redirect('/login');
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}

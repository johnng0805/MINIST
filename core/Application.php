<?php

namespace app\core;

use app\core\database\Database;
use app\core\models\DbModel;
use app\models\Cart;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public Router $router;
    public Request $request;
    public Response $response;

    public Database $db;
    public ?DbModel $dbModel;

    public Session $session;
    public string $userInfo;

    public View $view;
    public string $layout = 'main';

    public ?Controller $controller = null;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        if ($config['user']) {
            $this->userInfo = $config['user'];
        }

        $this->session = new Session();

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $this->view = new View();

        $isLoggedIn = $this->session->get('userID');
        if ($isLoggedIn) {
            $isLoggedInKey = $this->userInfo::primaryKey();
            $this->dbModel = $this->userInfo::findOne([$isLoggedInKey => $isLoggedIn]);
        } else {
            $this->dbModel = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            $this->layout = 'error';
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function login(DbModel $dbModel)
    {
        $this->dbModel = $dbModel;
        $primaryKey = $dbModel->primaryKey();
        $primaryValue = $dbModel->{$primaryKey};

        $cartID = $this->initializeCart($primaryValue);

        $this->session->set('userID', $primaryValue);
        $this->session->set('cartID', $cartID);

        return true;
    }

    public function logout()
    {
        $this->dbModel = null;
        $this->session->remove('userID');
        $this->session->remove('cartID');
    }

    public function initializeCart($user_id)
    {
        $cart = new Cart();
        $cart->loadData(['user_id' => $user_id]);

        if (!$cart->isCreated($user_id)) {
            if ($cart->validate() && $cart->save()) {
                $cartInfo = $cart->isCreated($user_id);
                $cartKeyValue = $cartInfo->id;

                return $cartKeyValue;
            }
        } else {
            $cartInfo = $cart->isCreated($user_id);
            $cartKeyValue = $cartInfo->id;

            return $cartKeyValue;
        }
    }

    public static function isGuest()
    {
        return !self::$app->dbModel;
    }
}

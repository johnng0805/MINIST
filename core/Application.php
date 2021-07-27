<?php

namespace app\core;

use app\core\database\Database;
use app\core\models\DbModel;

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
        $this->userInfo = $config['user'];

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
        echo $this->router->resolve();
    }

    public function login(DbModel $dbModel)
    {
        $this->dbModel = $dbModel;
        $primaryKey = $dbModel->primaryKey();
        $primaryValue = $dbModel->{$primaryKey};
        $this->session->set('userID', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->dbModel = null;
        $this->session->remove('userID');
    }

    public static function isGuest()
    {
        return !self::$app->dbModel;
    }
}

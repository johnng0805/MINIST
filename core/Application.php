<?php

namespace app\core;

use app\core\database\Database;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public Router $router;
    public Request $request;
    public Response $response;

    public Database $db;

    public View $view;
    public string $layout = 'main';

    public ?Controller $controller = null;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $this->view = new View();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}

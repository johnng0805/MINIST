<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public Router $router;
    public Request $request;

    public View $view;
    public string $layout = 'main';

    public ?Controller $controller = null;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->router = new Router($this->request);

        $this->view = new View();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}

<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\controllers\AdminController;
use app\controllers\AuthController;
use app\controllers\CartController;
use app\controllers\PaymentController;
use app\controllers\SiteController;
use app\core\Application;

$config = [
    'user' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/about', [SiteController::class, 'test']);
/**
 * Administrative routes
 */
$app->router->get('/admin', [AdminController::class, 'store']);
$app->router->post('/admin/category', [AdminController::class, 'category']);
$app->router->post('/admin/vendor', [AdminController::class, 'vendor']);
$app->router->post('/admin/product', [AdminController::class, 'product']);
$app->router->post('/admin/product/image', [AdminController::class, 'image']);
/**
 *  Get route
 */
$app->router->get('/products', [SiteController::class, 'getAllProducts']);
$app->router->get('/image', [SiteController::class, 'image']);
/**
 *  Product Route
 */
$app->router->get('/product', [SiteController::class, 'product']);
$app->router->get('/productInfo', [SiteController::class, 'getProductInfo']);
$app->router->get('/productImages', [SiteController::class, 'getProductImg']);
/**
 *  Cart Route
 */
$app->router->get('/cart', [CartController::class, 'cart']);
$app->router->post('/cart', [CartController::class, 'addToCart']);
$app->router->get('/cartItems', [CartController::class, 'getCartItems']);
$app->router->delete('/cartItems', [CartController::class, 'removeCartItem']);
/**
 *  Payment Route
 */
$app->router->get('/cart/checkout', [PaymentController::class, 'checkout']);
$app->router->post('/cart/checkout', [PaymentController::class, 'checkout']);

$app->router->get('/getID', [SiteController::class, 'getID']);

$app->run();

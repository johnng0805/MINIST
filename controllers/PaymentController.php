<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\UserAddress;
use app\models\UserPayment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->setLayout("main");
    }

    public function checkout(Request $request, Response $response)
    {
        $userSession = Application::$app->session;
        $userAddress = new UserAddress();
        $userPayment = new UserPayment();

        if ($request->isPost()) {
            $data = json_decode(stripcslashes($_GET["data"]));
            // $userSession->set("checkoutList", $data);
            return http_response_code(200);
        }

        return $this->render("checkout", ['userAddress' => $userAddress, 'userPayment' => $userPayment]);
    }
}

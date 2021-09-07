<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\Product;
use app\models\ProductImage;
use app\models\Vendor;

define("ADMIN_PATH", "/admin");
define("ADMIN_LAYOUT", "admin");
define("ADMIN_STORE", "store");
define("IMG_UPLOAD", dirname(__DIR__) . "/public/assets/upload/");
class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout(ADMIN_LAYOUT);
    }

    public function dashboard()
    {
        # code...
    }

    public function store()
    {
        return $this->render(ADMIN_STORE);
    }

    public function category(Request $request, Response $response)
    {
        $category = new Category();

        if ($request->isPost()) {
            $category->loadData($request->getBody());

            if ($category->validate()) {
                $category->save();
            }

            $response->redirect(ADMIN_PATH);
        }
    }

    public function vendor(Request $request, Response $response)
    {
        $vendor = new Vendor();

        if ($request->isPost()) {
            $vendor->loadData($request->getBody());

            if ($vendor->validate()) {
                $vendor->save();
            }

            $response->redirect(ADMIN_PATH);
        }
    }

    public function product(Request $request, Response $response)
    {
        $product = new Product();

        if ($request->isPost()) {
            $product->loadData($request->getBody());

            if ($product->validate()) {
                $product->save();
            }

            $response->redirect(ADMIN_PATH);
        }
    }

    public function image(Request $request, Response $response)
    {
        $pdImage = new ProductImage();

        if ($request->isPost()) {
            $pdImage->loadData($request->getBody());
            $file = $request->getFile();
        }

        $uploadedFile = $this->uploadFile($file);

        if (!$uploadedFile['error']) {
            $pdImage->setImage($uploadedFile['fileName']);

            if ($pdImage->validate()) {
                if ($pdImage->save()) {
                    $response->redirect(ADMIN_PATH);
                } else {
                    echo "Error uploading to db";
                }
            } else {
                echo "Invalid image";
            }
        } else {
            echo $uploadedFile['error'];
        }
    }

    private function uploadFile(array $file)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileType = mime_content_type($fileTmpName);

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['image/jpg', 'image/jpeg', 'image/png'];

        if (!in_array($fileType, $allowed)) {
            return ["error" => "Not image file"];
        }

        if ($fileError != 0) {
            return ["error" => "File error"];
        }

        if ($fileSize >= 50000000) {
            return ["error" => "File too large"];
        }

        $fileRename = uniqid('', true) . "." . $fileActualExt;
        $fileDest = IMG_UPLOAD . $fileRename;

        move_uploaded_file($fileTmpName, $fileDest);
        return ["fileName" => $fileRename];
    }
}

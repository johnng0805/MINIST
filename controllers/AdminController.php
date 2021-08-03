<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\PdImage;
use app\models\Product;
use app\models\Vendor;

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

    public function category(Request $request, Response $response)
    {
        $category = new Category();

        if ($request->isPost()) {
            $category->loadData($request->getBody());

            if ($category->validate() && $category->save()) {
                $response->redirect('/admin');
            }

            $response->redirect('/admin');
        }
    }

    public function vendor(Request $request, Response $response)
    {
        $vendor = new Vendor();

        if ($request->isPost()) {
            $vendor->loadData($request->getBody());

            if ($vendor->validate() && $vendor->save()) {
                $response->redirect('/admin');
            }

            $response->redirect('/admin');
        }
    }

    public function product(Request $request, Response $response)
    {
        $product = new Product();

        if ($request->isPost()) {
            $product->loadData($request->getBody());

            if ($product->validate() && $product->save()) {
                $response->redirect('/admin');
            }
            echo "<pre>";
            var_dump($product);
            echo "</pre>";
            echo "error";
        }
    }

    public function image(Request $request, Response $response)
    {
        $pdImage = new PdImage();

        if ($request->isPost()) {
            $pdImage->loadData($request->getBody());
            $file = $request->getFile();
        }

        $uploadedFile = $this->uploadFile($file);

        if (!$uploadedFile['error']) {
            $pdImage->setImage($uploadedFile['fileName']);

            if ($pdImage->validate() && $pdImage->save()) {
                $response->redirect('/admin');
            } else {
                echo "Error uploading to db";
            }
        } else {
            echo $uploadedFile['error'];
        }
    }

    public function uploadFile(array $file)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileRename = uniqid('', true) . "." . $fileActualExt;
                    $fileDest = "./assets/upload/" . $fileRename;

                    move_uploaded_file($fileTmpName, $fileDest);
                    $path = $fileRename;

                    return [
                        'fileName' => $fileRename
                    ];
                } else {
                    return [
                        'error' => 'File too large.'
                    ];
                }
            } else {
                return [
                    'error' => 'File error.'
                ];
            }
        } else {
            return [
                'error' => 'Not image file.'
            ];
        }
    }
}

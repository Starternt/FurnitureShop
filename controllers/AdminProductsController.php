<?php

class AdminProductsController
{
    public function actionIndex()
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        $products = Product::getFullProductsList();

        require_once ROOT . '/views/adminProducts/index.php';
        return true;
    }

    public function actionDelete($id)
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        if (isset($_POST['submit'])) {
            Product::deleteProduct($id);
            header('Location:/admin/products');
        }

        require_once ROOT . '/views/adminProducts/delete.php';
        return true;
    }

    public function actionUpdate($id)
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($id);
        if (isset($_POST['submit'])) {
            $options['name'] = htmlspecialchars($_POST['name']);
            $options['code'] = htmlspecialchars($_POST['code']);
            $options['price'] = htmlspecialchars($_POST['price']);
            $options['category'] = htmlspecialchars($_POST['category']);
            $options['brand'] = htmlspecialchars($_POST['brand']);
            $options['description'] = htmlspecialchars($_POST['description']);
            $options['availability'] = htmlspecialchars($_POST['availability']);
            $options['status'] = htmlspecialchars($_POST['status']);

            if (Product::updateProductById($id, $options)) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/$id.jpg");
                }
            }
            header('Location: /admin/products');
        }

        require_once ROOT . '/views/adminProducts/update.php';
        return true;
    }

    public function actionCreate()
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        $categories = Category::getCategoriesList();

        if (isset($_POST['submit'])) {
            $options['name'] = htmlspecialchars($_POST['name']);
            $options['code'] = htmlspecialchars($_POST['code']);
            $options['price'] = htmlspecialchars($_POST['price']);
            $options['category'] = htmlspecialchars($_POST['category']);
            $options['brand'] = htmlspecialchars($_POST['brand']);
            $options['description'] = htmlspecialchars($_POST['description']);
            $options['availability'] = htmlspecialchars($_POST['availability']);
            $options['status'] = htmlspecialchars($_POST['status']);

            $id = Product::createProduct($options);
            if ($id) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/$id.jpg");
                }
                header('Location:/admin/products');
            }
        }

        require_once ROOT . '/views/adminProducts/create.php';
        return true;
    }
}
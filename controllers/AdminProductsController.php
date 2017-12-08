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
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category'] = $_POST['category'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

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
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category'] = $_POST['category'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

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
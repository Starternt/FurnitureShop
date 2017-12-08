<?php

class CartController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $productsList = Cart::getProducts();
        $totalPrice = Cart::getTotalPrice();
        $products = array();
        if (isset($productsList) && is_array($productsList)) {
            $productsIds = array_keys($productsList);
            $products = Product::getProductByIds($productsIds);
        }

        require_once(ROOT . "/views/cart/index.php");
        return true;
    }

    public function actionAdd($id)
    {

        Cart::addProduct($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionCheckout()
    {
        $categories = Category::getCategoriesList();
        $totalPrice = Cart::getTotalPrice();
        $goodsAmount = Cart::countItems();
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $comment = htmlspecialchars($_POST['comment']);
            $id = $_SESSION['user'];
            $productsList = Cart::getProducts(); //Список id=>количество, товары
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Ошибка: Имя не должно быть короче 3-х символов";
            }
            if ($errors == false) {
                Order::save($name, $phone, $comment, $id, $productsList);
            }
        }

        require_once ROOT . '/views/cart/checkout.php';
        return true;
    }
}
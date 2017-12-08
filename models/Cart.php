<?php

    class Cart{
        public static function addProduct($id){
            $id = intval($id);
            $productsInCart = array();

            if(isset($_SESSION['products'])){
                $productsInCart = $_SESSION['products'];
            }
            if(array_key_exists($id, $productsInCart)){
                $productsInCart[$id]++;
            }
            else {
                $productsInCart[$id] = 1;
            }


            $_SESSION['products'] = $productsInCart;
            return self::countItems();

        }

        public static function countItems(){
            if(isset($_SESSION['products'])){
                $quantity = 0;
                foreach ($_SESSION['products'] as $count){
                    $quantity = $quantity + $count;
                }
                return $quantity;
            }
            else {
                return 0;
            }
        }

        public static function getProducts(){
            if(isset($_SESSION['products'])){
                return $_SESSION['products'];
            }
            else return false;
        }

        public static function deleteProduct($id){
            $productsList = self::getProducts();
            unset($productsList[$id]);
            $_SESSION['products'] = $productsList;
        }

        public static function getTotalPrice(){
            $totalPrice = 0;
//            $productsIds = array_keys($_SESSION['products']);
//            $products = Product::getProductByIds($productsIds);
//            foreach($products as $i => $array){
//                $prices[$i] = $array['price'];
//            }
//            foreach ($_SESSION['products'] as $i=>$product){
//                $totalPrice = $totalPrice + ($product*$prices[$i]);
//            }
//            return $totalPrice;
            if(isset($_SESSION['products'])){
                $productsIds = array_keys($_SESSION['products']);
            } else return 0;

            $products = Product::getProductByIds($productsIds);
            $productsList = self::getProducts();
            foreach ($products as $i=> $product){
                $totalPrice= $totalPrice + $product['price'] * $productsList[$product['id']];
            }
            return $totalPrice;


        }

    }
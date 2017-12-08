<?php

    class AdminOrderController{
        public function actionIndex(){
            if(!User::isAdmin()){
                header('Location: /');
            }
            $orderList = Order::getOrders();

            require_once ROOT.'/views/adminOrder/index.php';
            return true;
        }
        public function actionView($id){
            if(!User::isAdmin()){
                header('Location: /');
            }
            $order = Order::getOrderById($id);
            $jsonProducts = Order::getOrderProducts($id);
            $jsonProducts = json_decode($jsonProducts['products'], true);

            $ids = array_keys($jsonProducts);
            $quantity = array_values($jsonProducts);

            $products = Product::getProductByIds($ids);



            require_once ROOT.'/views/adminOrder/view.php';
            return true;
        }

        public function actionDelete($id){
            if(!User::isAdmin()){
                header('Location: /');
            }
            if(isset($_POST['submit'])){
                Product::deleteOrder($id);
                header('Location:/admin/order');
            }

            require_once ROOT.'/views/adminOrder/delete.php';
        }
        public function actionUpdate($id){
            if(!User::isAdmin()){
                header('Location: /');
            }
            $order = Order::getOrderById($id);
            if(isset($_POST['submit'])) {
                $options['user_name'] = $_POST['user_name'];
                $options['user_phone'] = $_POST['user_phone'];
                $options['user_comment'] = $_POST['user_comment'];
                $options['date'] = $_POST['date'];
                $options['status'] = $_POST['status'];
                Order::updateOrderById($id, $options);
                header('Location:/admin/order');

            }

            require_once ROOT.'/views/adminOrder/update.php';
            return true;
        }

    }
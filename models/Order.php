<?php

    class Order{
        public static function save($name, $phone, $comment, $id, $products){
            $products = json_encode($products);
            $db = Db::getConnection();
            $sql = "INSERT INTO `product_order`(user_name, user_phone, user_comment, user_id, products)
                    VALUES(:name, :phone, :comment, :id, :products)";
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':phone', $phone,PDO::PARAM_STR);
            $result->bindParam(':comment', htmlspecialchars($comment),PDO::PARAM_STR);
            $result->bindParam(':id', $id,PDO::PARAM_STR);
            $result->bindParam(':products', $products,PDO::PARAM_STR);

            $result->execute();
        }

        public static function getOrders(){
            $db = Db::getConnection();
            $sql = "SELECT * FROM product_order";
            $result = $db->prepare($sql);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($row = $result->fetch()){
                $orderList[$i]['id'] = $row['id'];
                $orderList[$i]['user_name'] = $row['user_name'];
                $orderList[$i]['user_phone'] = $row['user_phone'];
                $orderList[$i]['user_comment'] = $row['user_comment'];
                $orderList[$i]['user_id'] = $row['user_id'];
                $orderList[$i]['date'] = $row['date'];
                $orderList[$i]['products'] = $row['products'];
                $orderList[$i]['status'] = $row['status'];
                $i++;
            }
            return $orderList;
        }
        public static function getOrderById($id){
            $db = Db::getConnection();
            $sql = "SELECT * FROM product_order WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetch();
        }
        public static function getOrderProducts($id){ // Возвращает json строку продуктов с заказа клиента
            $db = Db::getConnection();
            $sql = "SELECT `products` FROM product_order WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

        public static function getStatusById($id){
            switch ($id){
                case 1: return "Новый заказ"; break;
                case 2: return "Товар в обработке"; break;
                case 3: return "Товар в процессе доставки"; break;
                case 4: return "Товар доставлен"; break;
            }
        }
        public static function deleteOrder($id){
            $db = Db::getConnection();

            $sql = "DELETE FROM _order WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);
            $result->execute();
        }
        public static function updateOrderById($id, $options){
            $db = Db::getConnection();

            $sql = "UPDATE product_order SET `user_name` = :user_name, user_phone = :user_phone, user_comment = :user_comment, `date` = :date, status = :status WHERE `id` = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
            $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_INT);
            $result->bindParam(':user_comment', $options['user_comment'], PDO::PARAM_INT);
            $result->bindParam(':date', $options['date'], PDO::PARAM_INT);
            $result->bindParam(':status', $options['status'], PDO::PARAM_STR);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            return $result->execute();
        }
    }
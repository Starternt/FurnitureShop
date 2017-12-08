<?php

    class Product{
        const SHOW_BY_DEFAULT = 6;
        public static function getProductList($count = self::SHOW_BY_DEFAULT){
            $db = Db::getConnection();

            $sql = 'SELECT id, name, price, status FROM product WHERE status = "1" ORDER BY id ASC LIMIT :count';

            $result = $db->prepare($sql);
            $result->bindParam(':count', $count, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $productList = array();
            $i = 0;
            while($row = $result->fetch()){
                $productList[$i]['id'] = $row['id'];
                $productList[$i]['name'] = $row['name'];
                $productList[$i]['image'] = Product::getImage($row['id']);
                $productList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productList;
//            print_r($productList);
        }

        public static function getProductsByCategory($categoryId, $page = 1){
            $limit = self::SHOW_BY_DEFAULT;
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();

            $sql = 'SELECT id, name, price, status FROM product WHERE category_id = :categoryId ORDER BY id ASC LIMIT :limit OFFSET :offset';

            $result = $db->prepare($sql);
            $result->bindParam(':limit', $limit, PDO::PARAM_INT);
            $result->bindParam(':offset', $offset, PDO::PARAM_INT);
            $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

            $result->execute();
            $i = 0;
            $productsList = array();
            while($row = $result->fetch()){
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['image'] = Product::getImage($row['id']);
                $productsList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productsList;
        }

        public static function getProductById($id){
            $db = Db::getConnection();

            $sql = 'SELECT id, name, category_id, code, price, status, availability, brand, status, description FROM product WHERE id = :id AND status = 1';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
//            $i = 0;
            $product = $result->fetch();
            return $product;
        }

        public static function getProductByIds($idsArray){
            $db = Db::getConnection();

            $idsString = implode(',', $idsArray);

            $sql = 'SELECT * FROM product WHERE status= 1 AND id IN ('.$idsString.')';
            $result = $db->prepare($sql);
//            $result = $db->query($sql);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $products = array();
            $i = 0;

            while($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['code'] = $row['code'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row ['price'];
                $i++;
            }
            return $products;

        }

        public static function getImage($id){

            $noExists = "no-image.jpg";
            $path = "/upload/images/products/";
            $pathToImage = $path.$id.'.jpg';

            if(file_exists(ROOT.$pathToImage)){
                return $pathToImage;
            }
            else return $path.$noExists;

        }

        public static function getPathToImages($id){ // Method for getting images for a product in "view"
            $path = "/upload/images/products/";
            $pathToImage = $path.$id.'.jpg';
            $images = array();
            if(file_exists(ROOT.$pathToImage)){
                $images[] = $pathToImage;
            }
            $i = 1;
            for($j = 0; $j<7; $j++){
                $pathToAdditionalImages = $path.$id.'_'.$i.'.jpg';
                if (file_exists(ROOT . $pathToAdditionalImages)) {
                    $images[] = $pathToAdditionalImages;
                    $i++;
                }
            }
            return $images;
        }

        public static  function getTotalCountProductsByCategory($categoryId){

            $db = Db::getConnection();

            $sql = 'SELECT COUNT(id) AS count FROM product WHERE category_id = :categoryId';
            $result = $db->prepare($sql);
            $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $row = $result->fetch();

            return $row['count'];

        }
        public static function getFullProductsList(){
            $db = Db::getConnection();

            $sql = 'SELECT id, name, price, code, status FROM product ORDER BY id ASC';

            $result = $db->prepare($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $productList = array();
            $i = 0;
            while($row = $result->fetch()){
                $productList[$i]['id'] = $row['id'];
                $productList[$i]['name'] = $row['name'];
                $productList[$i]['image'] = Product::getImage($row['id']);
                $productList[$i]['code'] = $row['code'];
                $productList[$i]['price'] = $row['price'];
                $productList[$i]['status'] = $row['status'];
                $i++;
            }
            return $productList;
//            print_r($productList);
        }
        public static function deleteProduct($id){
            $db = Db::getConnection();

            $sql = "DELETE FROM product WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);
            $result->execute();
        }

        public static function updateProductById($id, $options){
            $db = Db::getConnection();

            $sql = "UPDATE product SET `name` = :name, code = :code, price = :price, category_id = :category, brand = :brand, 
                    description = :description, availability = :availability, status = :status WHERE `id` = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
            $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
            $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
            $result->bindParam(':category', $options['category'], PDO::PARAM_INT);
            $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
            $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
            $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            return $result->execute();
        }

        public static function createProduct($options){
            $db = Db::getConnection();

            $sql = "INSERT INTO `product`(name, code, price, category_id, brand, description, availability, status) 
                    VALUES (:name, :code, :price, :category, :brand, :description, :availability, :status)";

            $result = $db->prepare($sql);
            $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
            $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
            $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
            $result->bindParam(':category', $options['category'], PDO::PARAM_INT);
            $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
            $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
            $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

            if($result->execute()){
                return $db->lastInsertId();
            }
            else return false;

        }
    }
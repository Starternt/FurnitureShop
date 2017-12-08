<?php

    Class ProductController{
        public function actionView($id){
            $categories = Category::getCategoriesList();
            $product = Product::getProductById($id);
            $images = Product::getPathToImages($id); // нижние изображения товара


            require_once(ROOT."/views/product/index.php");
            return true;
        }
    }
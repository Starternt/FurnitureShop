<?php
include_once ROOT.'/models/Category.php';
include_once ROOT."/models/Product.php";

    class SiteController{
        public function actionIndex(){
            $active = 1;
            $categories = Category::getCategoriesList();
            $product = Product::getProductList();

            require_once ROOT.'/views/site/index.php';
            return true;
        }

        public function actionAbout(){
            $active = 4;

            require_once ROOT.'/views/about/about.php';
            return true;
        }

    }
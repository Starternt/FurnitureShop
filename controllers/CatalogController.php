<?php

class CatalogController
{
    public function actionIndex($categoryId, $page = 1)
    {
        $active = 2;

        $category = Category::getCategoriesList();
        $products = Product::getProductsByCategory($categoryId, $page);
        $total = Product::getTotalCountProductsByCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/category/index.php');
        return true;
    }
}
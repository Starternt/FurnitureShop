<?php

class AdminCategoryController
{
    public function actionIndex()
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        $categories = Category::getCategoriesList();

        require_once ROOT . '/views/adminCategory/index.php';
        return true;
    }

    public function actionCreate()
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            Category::createCategory($options);
            header('Location:/admin/category');
        }

        require_once ROOT . '/views/adminCategory/create.php';
        return true;
    }

    public function actionUpdate($id)
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];
            Category::updateCategoryById($id, $options);
            header('Location: /admin/category');
        }

        require_once ROOT . '/views/adminCategory/update.php';
        return true;
    }

    public function actionDelete($id)
    {
        if (!User::isAdmin()) {
            header('Location: /');
        }
        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header('Location: /admin/category');
        }

        require_once ROOT . '/views/adminCategory/delete.php';
        return true;
    }
}
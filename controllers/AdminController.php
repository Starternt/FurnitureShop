<?php

    class AdminController{
        public function actionIndex(){
            if(!User::isAdmin()){
                header('Location: /');
            }

            require_once ROOT.'/views/admin/index.php';
            return true;
        }
    }
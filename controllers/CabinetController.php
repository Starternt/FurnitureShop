<?php

    class CabinetController{
        public function actionIndex(){
            $active = 3;
            if(!isset($_SESSION['user'])){
                header("Location: /login");
            }
            $id = $_SESSION['user'];
            $userData = User::getUserDataById($id);
            $userName = $userData['name'];

            require_once (ROOT.'/views/cabinet/index.php');
            return true;
        }

        public function actionEdit(){
            $active = 3;
            if(!isset($_SESSION['user'])){
                header("Location: /login");
            }
            $id = $_SESSION['user'];
            $userData = User::getUserDataById($id);
            $fillFields = true;
            $checkCorrectPass = true;
            $checkEqualPass = true;
            $success = false;
            if(isset($_POST['submit'])){
                $oldPass = $_POST['oldPass'];
                $newPass = $_POST['newPass'];
                if($oldPass == false || $newPass == false){
                    $fillFields = false;
                }
                else {
                    if ($oldPass === $newPass) {
                        $checkCorrectPass = false;
                    } else {
                        $oldPassDb = $userData['password'];
                        if ($oldPass === $oldPassDb) {
                            User::changePassword($id, $newPass);
                            $success = true;
                        } else $checkEqualPass = false;
                    }
                }
            }


            require_once ROOT.'/views/cabinet/edit.php';
            return true;
        }
    }
<?php

class UserController
{
    public function actionRegistration()
    {
        $active = 2;
        if (User::isLogged()) {
            header("Location: /cabinet");
        }
        $name = false;
        $password = false;
        $email = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Имя не должно быть короче 4 символов";
            }
            if (!User::checkPassword($password)) {
                $errors[] = "Пароль должен быть длинее 4 и короче 16 символов";
            }
            if (!User::checkEmail($email)) {
                $errors[] = "Некорректный Email!";
            }
            if (User::checkEmailExists($email)) {
                $errors[] = "Такой email уже существует";
            }

            if ($errors == false) {
                $result = User::registration($name, $password, $email);
            }
        }

        require_once(ROOT . '/views/user/registration.php');
        return true;
    }

    public function actionLogin()
    {
        $active = 3;
        if (User::isLogged()) {
            header("Location: /cabinet");
        }
        $email = false;
        $password = false;
        $test = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = "Wrong email";
            }
            if (!User::checkPassword($password)) {
                $errors[] = "Пароль должен быть длинее 4 и короче 16 символов";
            }

            if ($errors == false) {
                $userId = User::checkUserData($email, $password);
                if ($userId == false) {
                    $errors[] = "Email или пароль неверны";
                } else {
                    User::auth($userId);
                    header("Location: /cabinet");
                }
            }

        }
        require_once ROOT . '/views/user/login.php';
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");

        return true;
    }
}
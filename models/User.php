<?php

class User
{
    public static function checkName($name)
    {
        $name = strval($name);
        if (strlen($name) < 3) {
            return false;
        }
        return true;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) < 4) {
            return false;
        }
        return true;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM `user` WHERE `email` = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();

        if ($user) {
            if(password_verify($password, $user['password'])){
                return $user['id'];
            }
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function registration($name, $password, $email)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = Db::getConnection();

        $sql = 'INSERT INTO `user`(name, email, password) VALUES(:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public static function getUserDataById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT `id`, `name`, `email`, `password` FROM user WHERE `id` = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function changePassword($id, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user SET `password` = :password WHERE `id` = :id;";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
    }

    public static function isLogged()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else return false;
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $db = Db::getConnection();
            $sql = "SELECT `role` FROM `user` WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $role = $result->fetch();
            if ($role['role'] == "admin") {
                return true;
            } else return false;
        } else return false;
    }
}
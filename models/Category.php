<?php

class Category
{
    /**
     * @return array
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM category WHERE status = "1" ORDER BY sort_order, name ASC');
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * @param $options
     * @return bool
     */
    public static function createCategory($options)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO `category`(`name`, `sort_order`, `status`) VALUES(:name, :sort_order, :status)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM category WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }

    /**
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateCategoryById($id, $options)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE `category` SET `name` = :name, `sort_order` = :sort_order, `status` = :status WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE FROM category WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}
<?php


namespace App\classes;
use App\classes\database;

class category
{
    public function addCategory($data)
    {
        $categoryName = $data['categoryName'];
        $status = $data['status'];
        $sql = "INSERT INTO `category`(`categoryName`,`status`) VALUES ('$categoryName','$status')";
        $result = mysqli_query((new database)->dbCon(), $sql);

        if ($result) {
            $message = "<span style='color: green'> <strong>Category Added</strong> </span>";
            return $message;
        } else {
            $message = "<span style='color: red'><strong>Category Not Added</strong></span>";
            return $message;
        }
    }
    public function updateCategory($data)
    {
        $categoryName = $data['categoryName'];
        $status = $data['status'];
        $id = $data['id'];

        $sql = "UPDATE `category` SET `categoryName`='$categoryName',`status`='$status' WHERE `id`='$id'";
        $result = mysqli_query((new database)->dbCon(), $sql);

        if ($result) {
            header('location:edit-category.php?id='.$id);
            $message = "<span style='color: green'> <strong>Category Updated</strong> </span>";
            return $message;
        } else {
            header('location:edit-category.php?id='.$id);
            $message = "<span style='color: red'><strong>Category Not Updated</strong></span>";
            return $message;
        }
    }


    public function selectRow($id = ''){
           return mysqli_query((new database)->dbCon(),"SELECT * FROM `category` WHERE `id` = '$id'");
        }

    public function allCategory(){
           $result = mysqli_query((new database)->dbCon(),"SELECT * FROM `category`");
            return $result;
        }
    public function allActiveCategory(){
        $result = mysqli_query((new database)->dbCon(),"SELECT * FROM `category` WHERE `status` = 1");
        return $result;
    }
    public function allActiveBlog(){
        $result = mysqli_query((new database)->dbCon(),"SELECT * FROM `blog` WHERE `status` = 1 order by `id` desc");
        return $result;
    }
    public function searchPost($text){
        $result = mysqli_query((new database)->dbCon(),"SELECT * FROM `blog` WHERE `blogContent` LIKE '%$text%' and `status` = 1 order by `id` desc");
        return $result;
    }

    public function catPost($id){
        $result = mysqli_query((new database)->dbCon(),"SELECT * FROM `blog` WHERE `status` = 1 and `catId` = '$id' order by `id` desc ");
        return $result;
    }

    public function active($id)
    {
        mysqli_query((new database)->dbCon(), "UPDATE `category` SET `status` = 1 WHERE `id` = '$id'");
        }

    public function inactive($id)
    {
        mysqli_query((new database)->dbCon(), "UPDATE `category` SET `status` = 0 WHERE `id` = '$id'");
    }

    public function delete($id)
    {
        mysqli_query((new database)->dbCon(), "DELETE FROM `category` WHERE `id` = '$id'");
    }

    public function singlePost($id)
    {
        return mysqli_query((new database)->dbCon(),"SELECT * FROM `blog` WHERE `id` = '$id'");
    }

}
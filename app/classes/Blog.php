<?php


namespace App\classes;
use App\classes\database;

class Blog
{

    public function addBlog($data)
    {
        $file_name = $_FILES['blogImage']['name'];
        $fileex = explode('.', $file_name);
        $fileex = end($fileex);
        $file_name = date('ymdis.').$fileex;

        /** @var TYPE_NAME $catId */
        $catId	 = $data['catId'];
        $blogTitle = mysqli_real_escape_string((new database)->dbCon(),$data['blogTitle']);
        $blogContent = mysqli_real_escape_string((new database)->dbCon(),$data['blogContent']);
        $status = $data['status'];
        $name = $_SESSION['name'];

        $sql = "INSERT INTO `blog`(`catId`, `blogTitle`, `blogContent`, `blogImage`, `autherName`, `status`) VALUES ('$catId','$blogTitle', '$blogContent', '$file_name', '$name', '$status')";
        $result = mysqli_query((new database)->dbCon(), $sql);

        if ($result) {
            move_uploaded_file($_FILES['blogImage']['tmp_name'], '../uploads/'.$file_name);
            $message = "<span style='color: green'> <strong>Blog Posted Successfully</strong> </span>";
            return $message;
        } else {
            $message = "<span style='color: red'><strong>Blog Can not Post</strong></span>";
            return $message;
        }
    }


    public function updateBlog($data)
    {



        /** @var TYPE_NAME $catId */
        $catId	 = $data['catId'];
        $blogTitle = mysqli_real_escape_string((new database)->dbCon(),$data['blogTitle']);
        $blogContent = mysqli_real_escape_string((new database)->dbCon(),$data['blogContent']);
        $status = $data['status'];
        $name = $_SESSION['name'];
        $id = $_POST['id'];

        if ($_FILES['blogImage']['name'] == NULL){

            $sql = "UPDATE `blog` SET `catId` = '$catId', `blogTitle`= '$blogTitle',`blogContent`= '$blogContent', `autherName`= '$name', `status`= '$status' WHERE `id`='$id'";
            $result = mysqli_query((new database)->dbCon(), $sql);

        }else{
            $file_name = $_FILES['blogImage']['name'];
            $fileex = explode('.', $file_name);
            $fileex = end($fileex);
            $file_name = date('ymdis.').$fileex;

            move_uploaded_file($_FILES['blogImage']['tmp_name'], '../uploads/'.$file_name);

            $sql = "UPDATE `blog` SET `catId` = '$catId', `blogTitle`= '$blogTitle',`blogContent`= '$blogContent',`blogImage`= '$file_name', `autherName`= '$name', `status`= '$status' WHERE `id`='$id'";
            $result = mysqli_query((new database)->dbCon(), $sql);
        }


        if ($result) {
            header('location:edit-blog.php?id='.$id);
            $message = "<span style='color: green'> <strong>Category Updated</strong> </span>";
            return $message;
        } else {
            header('location:edit-blog.php?id='.$id);
            $message = "<span style='color: red'><strong>Category Not Updated</strong></span>";
            return $message;
        }
    }


    public function allBlog(){
        $result = mysqli_query((new database)->dbCon(),"SELECT `blog`.*, `category`. `categoryName` FROM `blog` INNER JOIN `category` ON `blog`. `catId` = `category`.`id` ORDER BY `id` DESC
");
        return $result;
    }


    public function active($id)
    {
        mysqli_query((new database)->dbCon(), "UPDATE `blog` SET `status` = 1 WHERE `id` = '$id'");
    }

    public function inactive($id)
    {
        mysqli_query((new database)->dbCon(), "UPDATE `blog` SET `status` = 0 WHERE `id` = '$id'");
    }

    public function delete($id)
    {
        mysqli_query((new database)->dbCon(), "DELETE FROM `blog` WHERE `id` = '$id'");
    }

    public function selectRow($id = ''){
        return mysqli_query((new database)->dbCon(),"SELECT * FROM `blog` WHERE `id` = '$id'");
    }

}
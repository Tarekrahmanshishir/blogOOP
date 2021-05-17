<?php


namespace App\classes;
use App\classes\database;


class user
{

    public function addUser($data)
    {
        $file_name = $_FILES['photo']['name'];
        $fileext = explode('.', $file_name);
        $fileext = end($fileext);
        $file_name = date('ymdis.').$fileext;

        $name = $data['name'];
        $username = $data['username'];
        $password = md5($data['password']);
        $status = $data['status'];

        $sql = "INSERT INTO `users`(`name`, `username`, `password`, `status`, `photo`) VALUES ('$name','$username', '$password', '$status', '$file_name')";
        $result = mysqli_query((new database)->dbCon(), $sql);

        if ($result) {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/profile/'.$file_name);
            $message = "<span style='color: green'> <strong>User Added Successfully</strong> </span>";
            return $message;
        } else {
            $message = "<span style='color: red'><strong>User Can not Post</strong></span>";
            return $message;
        }
    }

}
<?php


namespace App\classes;
use App\classes\database;

class login
{
    public function loginCheck($data)
    {
        $username = $data['username'];
        $password = md5($data['password']);

        $sql ="SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

        $result = mysqli_query((new database)->dbCon(),$sql);
        if ($result){
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];

                header('location:index.php');
            }else{
                $login_error = "Username or Password Invalid";
                return $login_error;
            }
        }else{
            die();
        }
    }
}
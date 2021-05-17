<?php


namespace App\classes;


class database
{
    public function dbCon()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "blog";
        $link = mysqli_connect($host, $username, $password, $db);

        return $link;
    }
}
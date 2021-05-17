<?php
require_once '../vendor/autoload.php';
$cat = new \App\classes\category();
$blog = new \App\classes\Blog();

if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->delete($id);
    header('location: manage-category.php');
}
if(isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->delete($id);

    $file = $_GET['filename'];
    unlink('../uploads/'.$file);

    header('location: manage-blog.php');
}
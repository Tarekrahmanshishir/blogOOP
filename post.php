<?php require_once 'header.php'; ?>

<?php

require_once 'vendor/autoload.php';

$cat = new \App\classes\category();

$category = $cat->allActiveCategory();

$getID = $_GET['id'];

$singlePost = $cat->singlePost($getID);


?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <?php
            while ($row1 = mysqli_fetch_assoc($singlePost)){ ?>

            <!-- Title-->
            <h1 class="mt-4"><?= $row1['blogTitle'] ?></h1>
            <!-- Author-->
            <p class="lead">
                by
                <a href="#!"><?= $row1['autherName'] ?></a>
            </p>
            <hr />
            <!-- Date and time-->
            <p>Posted on <?= date('d M Y', strtotime($row1['createtime'])) ?></p>
            <hr />
            <!-- Preview image-->
            <img class="img-fluid rounded" src="uploads/<?= $row1['blogImage'] ?>" alt="..." />
            <hr />
            <!-- Post content-->
            <p class="lead"><?= $row1['blogContent'] ?></p>
            <hr />
        </div>
        <?php } ?>

        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>

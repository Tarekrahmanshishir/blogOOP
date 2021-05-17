<?php require_once 'header.php'; ?>

<?php

require_once 'vendor/autoload.php';

$cat = new \App\classes\category();

$category = $cat->allActiveCategory();

$catId = $_GET['id'];
$catPost = $cat->catPost($catId);


?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8">
            <h1 class="my-4">
                Blog by Category
            </h1>
            <!-- Blog post-->
            <?php
            while ($row2 = mysqli_fetch_assoc($catPost)){ ?>
                <div class="card mb-4">
                    <img class="card-img-top" src="uploads/<?= $row2['blogImage'] ?>" alt="Card image cap" />
                    <div class="card-body">
                        <h2 class="card-title"><?= $row2['blogTitle'] ?></h2>
                        <p class="card-text"><?= substr($row2['blogContent'], 0, 250) ?> ...</p>
                        <a class="btn btn-primary" href="post.php?id=<?= $row2['id'] ?>">Read More →</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?= date('d M Y', strtotime($row2['createtime'])) ?> by
                        <a href="#!"><?= $row2['autherName'] ?></a>
                    </div>
                </div>
            <?php } ?>
            <!-- Blog post-->
        </div>

        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>

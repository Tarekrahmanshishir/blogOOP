<?php require_once 'header.php'; ?>

<?php

require_once 'vendor/autoload.php';

$cat = new \App\classes\category();

$category = $cat->allActiveCategory();
$blog = $cat->allActiveBlog();

?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8">
            <?php
            if (isset($_GET['search'])){

                $search = $_GET['search'];
                $search = $cat->searchPost($search);

                if (mysqli_num_rows($search) > 0){

                while ($row3 = mysqli_fetch_assoc($search)){ ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $row3['blogImage'] ?>" alt="Card image cap" />
                        <div class="card-body">
                            <h2 class="card-title"><?= $row3['blogTitle'] ?></h2>
                            <p class="card-text"><?= substr($row3['blogContent'], 0, 250) ?> ...</p>
                            <a class="btn btn-primary" href="post.php?id=<?= $row3['id'] ?>">Read More →</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?= date('d M Y', strtotime($row3['createtime'])) ?> by
                            <a href="#!"><?= $row3['autherName'] ?></a>
                        </div>
                    </div>

                        <?php
                }
                }else{
                    echo '<h1 class="my-4 text-center text-danger">Not Found!</h1>';
                }

            }else{

            ?>

            <?php } ?>
            <!-- Blog post-->
        </div>

        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>

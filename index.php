<?php require_once 'header.php'; ?>

<?php

require_once 'vendor/autoload.php';

$cat = new \App\classes\category();

$category = $cat->allActiveCategory();
$blog = $cat->allActiveBlog();

?>

<!--slider start-->
<header>
    <div class="carousel slide carousel-fade" id="carouselExampleIndicators" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/pexels-fauxels-3182805.jpg" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/pexels-medhat-ayad-439227.jpg" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/pexels-pixabay-459654.jpg" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!--slider end-->
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8">
            <h1 class="my-4"></h1>
            <!-- Blog post-->
            <?php
            while ($row1 = mysqli_fetch_assoc($blog)){ ?>
            <div class="card mb-4">
                <img class="card-img-top" src="uploads/<?= $row1['blogImage'] ?>" alt="Card image cap" />
                <div class="card-body">
                    <h2 class="card-title"><?= $row1['blogTitle'] ?></h2>
                    <p class="card-text"><?= substr($row1['blogContent'], 0, 250) ?> ...</p>
                    <a class="btn btn-primary" href="post.php?id=<?= $row1['id'] ?>">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?= date('d M Y', strtotime($row1['createtime'])) ?> by
                    <a href="#!"><?= $row1['autherName'] ?></a>
                </div>
            </div>
            <?php } ?>
            <!-- Blog post-->
        </div>

        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>

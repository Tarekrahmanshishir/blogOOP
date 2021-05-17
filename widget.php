
<!-- Side widgets-->
<div class="col-md-4">
    <!-- Search widget-->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="search.php?search=" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search for..." />
                    <span class="input-group-append"><button class="btn btn-secondary" type="submit">Go!</button></span>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <?php
                    while ($row = mysqli_fetch_assoc($category)){ ?>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="category.php?id=<?= $row['id'] ?>"><?= $row['categoryName'] ?></a></li>
                    </ul>
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!</div>
    </div>
</div>
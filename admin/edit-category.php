<?php require_once 'header.php'; ?>
<?php

require_once '../vendor/autoload.php';

$category = new \App\classes\category();

$id = $_GET['id'];

$results = $category->selectRow($id);
$row = mysqli_fetch_assoc($results);

if(isset($_POST['updateCategory'])){
    $message = $category->updateCategory($_POST);
}


?>
<row class="justify-content-center">
    <div class="col-lg-12 col-xl-8 offset-xl-2">
        <section class="card">
            <header class="card-header">
                Update Categorys
            </header>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="categoryName" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name" value="<?= $row['categoryName'] ?>">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Category Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" <?= $row['status'] == '1' ? 'checked':'' ?>>
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?= $row['status'] == '0' ? 'checked':'' ?>>
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="updateCategory" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                <!--modal-->
                    <?php
                    if (isset($message)){ ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert" aria-hi>

                        <?= $message ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <?php } ?>
                <!--modal-->
                </form>
            </div>
        </section>

    </div>
</row>
<?php require_once 'footer.php'; ?>
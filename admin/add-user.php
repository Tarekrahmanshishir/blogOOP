<?php require_once 'header.php'; ?>

<?php

require_once '../vendor/autoload.php';

$user = new \App\classes\user();


if(isset($_POST['addUser'])){
    $message = $user->addUser($_POST);
}


?>
<row class="justify-content-center">
    <div class="col-lg-12 col-xl-8 offset-xl-2">
        <section class="card">
            <header class="card-header">
                Add Users
            </header>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="blogContent" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                <span class="btn btn-white btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="photo" class="default">
                            </span>
                                </div>
                            </div>
                            <span class="badge badge-danger">NOTE!</span>
                            <span style="color: red;">Select User Profile Picture</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Your Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" data-validation="required">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">User Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" required="required">
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" required="required">
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="addUser" class="btn btn-primary">Save User</button>
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
<?php require_once 'header.php'; ?>
<?php

    require_once '../vendor/autoload.php';
    $category = new \App\classes\category();
    $blog = new \App\classes\Blog();

    $id = $_GET['id'];

    $results = $blog->selectRow($id);
    $row1 = mysqli_fetch_assoc($results);


    $allActiveCategory = $category->allActiveCategory();

    if(isset($_POST['updateBlog'])){
        $message = $blog->updateBlog($_POST);
    }


?>
<row class="justify-content-center">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Update Blog
            </header>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row1['id'] ?>">
                    <div class="form-group row">
                        <label for="blogTitle" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="blogTitle" name="blogTitle" value="<?= $row1['blogTitle'] ?>" placeholder="Enter Blog Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="blogContent" class="col-sm-2 col-form-label">Blog Content</label>
                        <div class="col-sm-10">
                            <textarea name="blogContent" class="summernote"><?= $row1['blogContent'] ?></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="blogContent" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="../uploads/<?= $row1['blogImage'] ?>" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                <span class="btn btn-white btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="blogImage" class="default" />
                            </span>
                    </div>
                </div>
                <span class="badge badge-danger">NOTE!</span>
                <span style="color: red;">Attached image thumbnail 200X150 Size</span>
            </div>
        </div>

        <div class="form-group row">
           <label for="blogCategory" class="col-sm-2 col-form-label">Blog Category</label>
            <div class="col-sm-10">
              <select class="form-control" name="catId">
                <option value="">Default select</option>
                  <?php while ($row = mysqli_fetch_assoc($allActiveCategory)){
                      ?>
                      <option <?= $row['id'] == $row1['catId'] ? 'selected':'' ?> value="<?= $row['id'] ?>"><?= $row['categoryName'] ?></option>
        <?php
                  } ?>

              </select>
            </div>
        </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Category Status</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="status" id="active" value="1" <?= $row1['status'] == 1 ? 'checked':'' ?> >
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?= $row1['status'] == 0 ? 'checked':'' ?>>
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="updateBlog" class="btn btn-primary">Update Blog</button>
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
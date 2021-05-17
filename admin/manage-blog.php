<?php require_once 'header.php'; ?>
<?php

require_once '../vendor/autoload.php';

$blog = new \App\classes\Blog();

$allBlog = $blog->allBlog();


?>
    <div class="row">
        <div class="col-sm-12">
            <section class="card">
                <header class="card-header">
                    Manage Blog
                    <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
                </header>
                <div class="card-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Content</th>
                                <th>Blog Image</th>
                                <th>Status</th>
                                <th style="width: 300px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sl = 1;
                            while ($row =mysqli_fetch_assoc($allBlog)){ ?>

                            <tr class="gradeX">
                                <td><?= $sl; ?></td>
                                <td><?= $row['categoryName'] ?></td>
                                <td><?= $row['blogTitle'] ?></td>
                                <style>
                                    .show-read-more .more-text{
                                        display: none;
                                    }
                                </style>
                                <td><p class="show-read-more"><?= $row['blogContent'] ?></p></td>



                                <td><img style="width: 70px; height: 60px;" src="../uploads/<?= $row['blogImage'] ?>" alt=""></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1){ ?>

                                        <a href="status.php?id=<?= $row['id'] ?>&blog=blog&inactive=inactive" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"> Active</i></a>
                                        <?php
                                    }else{ ?>
                                        <a href="status.php?id=<?= $row['id'] ?>&blog=blog&active=active" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-down"> Inactive</i></a>

                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="edit-blog.php?id=<?= $row['id']?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"> Edit</i></a>
                                    <a href="delete.php?id=<?= $row['id']?>&blog=blog&filename=<?= $row['blogImage'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"> Delete</i></a>
                                </td>
                            </tr>
                            <?php $sl++; } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No</th>
                                <th>Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Content</th>
                                <th>Blog Image</th>
                                <th>Status</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'footer.php'; ?>
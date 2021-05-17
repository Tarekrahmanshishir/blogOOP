<?php require_once 'header.php'; ?>
<?php

require_once '../vendor/autoload.php';

$cat = new \App\classes\category();

$category = $cat->allCategory();


?>
    <div class="row">
        <div class="col-sm-12">
            <section class="card">
                <header class="card-header">
                    Manage Category
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
                                <th>Status</th>
                                <th style="width: 300px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sl = 1;
                            while ($row =mysqli_fetch_assoc($category)){ ?>

                            <tr class="gradeX">
                                <td><?= $sl; ?></td>
                                <td><?= $row['categoryName'] ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1){ ?>

                                        <a href="status.php?id=<?= $row['id'] ?>&cat=category&inactive=inactive" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"> Active</i></a>
                                        <?php
                                    }else{ ?>
                                        <a href="status.php?id=<?= $row['id'] ?>&cat=category&active=active" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-down"> Inactive</i></a>

                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="edit-category.php?id=<?= $row['id']?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"> Edit</i></a>
                                    <a href="delete.php?id=<?= $row['id']?>&cat=category" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"> Delete</i></a>
                                </td>
                            </tr>
                            <?php $sl++; } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No</th>
                                <th>Category Name</th>
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
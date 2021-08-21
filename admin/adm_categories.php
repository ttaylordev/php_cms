<?php include "includes/adm_head.php";?>

<div id="wrapper">

<!-- Navigation -->
<?php include "includes/adm_nav.php";?>
<?php 

    
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome Admin 
                    </h1>

                    <div class="col-xs-6">
                        <?php // create new categories
                            insert_categories();
                        ?>
                            <!-- adding categories -->
                        <form class="" action=""  method="post">

                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>
                        <!-- editing categories -->
                        <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/adm_update_category.php";
                            }
                        ?>

                    </div>
                        <!-- category table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php find_all_categories(); // populate categories table?>
                                <?php delete_category(); // deletion of categories ?> 
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- footer -->
<?php include "includes/adm_foot.php";?>



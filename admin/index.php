<?php include "includes/adm_head.php";?>

    <div id="wrapper">
    
        <!-- Navigation -->
        <?php include "includes/adm_nav.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome admin 
                            <?php echo $_SESSION['username'];?>
                        </h1>

           
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



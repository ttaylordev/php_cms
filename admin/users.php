<?php include "includes/adm_head.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adm_nav.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome Admin
                    </h1>

                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {

                        case 'add_user';
                            include "includes/adm_add_user.php";
                            break;

                        case 'edit_user';
                            include "includes/adm_edit_user.php";
                            break;

                        case 'view_users';
                            include "includes/adm_view_all_users.php";
                            break;

                        default:
                            include "includes/adm_view_all_users.php";
                            break;
                    }
                    ?>
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
<?php include "includes/adm_foot.php"; ?>
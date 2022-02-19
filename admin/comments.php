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

                    // replace with a polymorphic solution, using the strategy pattern
                    switch ($source) {

                        case 'add_comment';
                            include "includes/adm_add_comment.php";
                            break;

                        case 'edit_comment';
                            include "includes/adm_edit_comment.php";
                            break;

                        case 'view_comments';
                            include "includes/adm_view_all_comments.php";
                            break;

                        default:
                            include "includes/adm_view_all_comments.php";
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
<?php include "includes/adm_head.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adm_nav.php"; ?>

    <?php
    if (isset($_GET['source'])) {
        $source = $_GET['source'];

        if ($source === 'view_posts') {
            echo "<div class='edit-grid-wrapper'>";
        }
    }
    ?>

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

                        case 'add_post';
                            include "includes/adm_add_post.php";
                            break;

                        case 'edit_post';
                            include "includes/adm_edit_post.php";
                            break;

                        default:
                            include "includes/adm_view_all_posts.php";
                            break;
                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <?php
        if ($source === 'view_posts') {
            echo "</div> <!-- /.edit-grid-wrapper -->";
        }
        ?>
    </div>

</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- footer -->
<?php include "includes/adm_foot.php"; ?>
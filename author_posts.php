<!-- pre-defined globally available helper functions included and html headers -->
<?php include "includes/head.php"; ?>

<!-- Navigation -->
<?php include $path . "/includes/nav.php"; ?>
<!-- /.navbar-collapse -->

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <!-- Blog Post -->
            <?php
            if (isset($_GET['view_by_author'])) {

                $post_author = $_GET['view_by_author'];
                $query = "SELECT * FROM posts WHERE post_author = '{$post_author}' ";
                $select_post = mysqli_query($connection, $query);
                confirm_query($query);

                while ($row = mysqli_fetch_assoc($select_post)) {

                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 200) . '... ';
                    $post_id = $row['post_id'];
                    $post_status = $row['post_status'];

                    if (strtoupper($post_status) === 'PUBLISHED') {
                        $content_loaded = true;
                        
                        include 'includes/blogposts.php';
                    } else {
                    }
                }
            } else {
                echo "Invalid author";
            }

            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
    <?php include "includes/foot.php"; ?>
</div>
<!-- /.container -->
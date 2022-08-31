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
            // <!-- wire in a http request on ../blogposts.php -->
            // <!-- receive in a $_POST['post_id'], the post_id -->
            // <!-- query the row -->
            // <!-- plug into the results -->
            // <!-- comments could be in a loop nested -->
            if (isset($_GET['view_by_post'])) {

                $post_id = $_GET['view_by_post'];
                $view_count_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = '{$post_id}'";
                $view_count_update = mysqli_query($connection, $view_count_query);
                confirm_query($view_count_query);


                $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
                $select_post = mysqli_query($connection, $query);
                confirm_query($query);

                while ($row = mysqli_fetch_assoc($select_post)) {

                    // echo $row['post_id'];

                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_id = $row['post_id'];
                }
            } else {
                echo "invalid post Id";
                header("Location: index.php");
            }

            ?>
            <!-- echo whole block with injected variables -->
            <!-- or echo variables into block of html -->
            <!-- Title -->
            <h1><?php echo $post_title; ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?php echo $post_author; ?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="<?php echo './images/' . $post_image; ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $post_content; ?></p>

            <hr>

            <!-- Blog Comments -->
            <?php include "includes/comments.php"; ?>
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
<!-- Header -->
<?php include 'includes/head.php'; ?>
<!-- Navigation -->
<?php include 'includes/nav.php'; ?>


<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php
            if (isset($_POST['submit'])) {
                $search = strtoupper($_POST['search']);
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($connection, $query);

                echo "<h1 class='page-header'>
                                $search
                                <small> Learn2Code</small>
                            </h1>";

                if (!$search_query) {
                    die("query failed" . mysqli_error($connection));
                } else {
                    $row_count = mysqli_num_rows($search_query);

                    if ($row_count == 0) {
                        echo "<h2>No result </h1>";
                    } else {

                        while ($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_id = $row['post_id'];

                            // First Blog Post
                            include 'includes/blogposts.php';
                        }
                    }

                    if ($search_query->num_rows) {
                        // page buttons
                        include 'includes/pager.php';
                    }
                }
            }
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <!-- /.row -->
    <hr>
    <!-- footer -->
    <?php include 'includes/foot.php'; ?>
</div>
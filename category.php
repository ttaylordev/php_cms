<!-- pre-defined globally available helper functions included and html headers -->
<?php include 'includes/head.php'; ?>
<!-- Navigation -->
<?php include 'includes/nav.php'; ?>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if (isset($_GET['category'])) {

                $cat_id = $_GET['category'];
                $query = "SELECT* FROM categories WHERE cat_id = $cat_id";
                $select_category_name = mysqli_query($connection, $query);

                $cat_name = mysqli_fetch_assoc($select_category_name)['cat_title'];
                $cat_name = ucfirst($cat_name);
                echo "
                        <h1 class='page-header'>
                            $cat_name
                            <small>Learn2Code</small>
                        </h1>";

                $query = "SELECT * FROM posts WHERE post_cat_id = $cat_id";
                $select_all_posts = mysqli_query($connection, $query);

                if (!$select_all_posts->num_rows) {

                    echo "<h3>There are no posts matching that category, please choose another.</h3>";
                } else {
                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200) . '... ';
                        $post_id = $row['post_id'];
                        $post_category = $row['post_category'];

                        //<!-- Blog Post -->
                        include 'includes/blogposts.php';
                    }
                }

                if ($select_all_posts->num_rows) {
                    // page buttons
                    include 'includes/pager.php';
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
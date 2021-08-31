<!-- pre-defined globally available helper functions included and html headers -->
<?php include 'includes/head.php'; ?>
  <!-- Navigation -->
    <?php include 'includes/nav.php'; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                 <h1 class="page-header">
                    Tech Snippets Blog
                    <small>Learn2Code</small>
                </h1>

                <?php 
                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_posts)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200) . '... ';
                        $post_id = $row['post_id'];
                        $post_status = strtoupper($row['post_status']);
                                               
                        if($post_status == 'PUBLISHED'){
                            //<!-- First Blog Post -->
                            include 'includes/blogposts.php';
                        } else {
                        }

                    }  
                    if($post_status !== 'PUBLISHED'){
                        echo "<h1 class='text-center'> No content has been published. </h1>";
                    }

                   

                    if($select_all_posts->num_rows){
                        // page buttons
                        include 'includes/pager.php';
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
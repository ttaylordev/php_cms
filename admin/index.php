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

                <?php
// TODO: I should query much of this once, and store it on the session?
                    $query_posts = "SELECT COUNT(*) FROM posts";
                    $query_users = "SELECT COUNT(*) FROM users";
                    $query_comments = "SELECT COUNT(*) FROM comments";
                    $query_categories = "SELECT COUNT(*) FROM categories";

                    $posts_query_results = mysqli_query($connection, $query_posts);
                    $users_query_results = mysqli_query($connection, $query_users);
                    $comments_query_results = mysqli_query($connection, $query_comments);
                    $categories_query_results = mysqli_query($connection, $query_categories);

                    $posts_query_arr = mysqli_fetch_assoc($posts_query_results);
                    $users_query_arr = mysqli_fetch_assoc($users_query_results);
                    $comments_query_arr = mysqli_fetch_assoc($comments_query_results);
                    $categories_query_arr = mysqli_fetch_assoc($categories_query_results);
                    

                ?>
                <!-- /.row -->        
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo($posts_query_arr['COUNT(*)']);?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo($comments_query_arr['COUNT(*)']);?></div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo($users_query_arr['COUNT(*)']);?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo($categories_query_arr['COUNT(*)']);?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
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



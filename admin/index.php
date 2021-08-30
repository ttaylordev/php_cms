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
                            Welcome <?php echo $_SESSION['username'];?>
                        </h1>
           
                    </div>
                </div>

                <?php
// TODO: I should query much of this once, and store it on the a back end global variable?
                    $query_posts = "SELECT COUNT(*) FROM posts";
                    $query_users = "SELECT COUNT(*) FROM users";
                    $query_comments = "SELECT COUNT(*) FROM comments";
                    $query_categories = "SELECT COUNT(*) FROM categories";

                    $posts_query_results = mysqli_query($connection, $query_posts);
                    $users_query_results = mysqli_query($connection, $query_users);
                    $comments_query_results = mysqli_query($connection, $query_comments);
                    $categories_query_results = mysqli_query($connection, $query_categories);

                    $posts_count = mysqli_fetch_assoc($posts_query_results)['COUNT(*)'];
                    $users_count = mysqli_fetch_assoc($users_query_results)['COUNT(*)'];
                    $comments_count = mysqli_fetch_assoc($comments_query_results)['COUNT(*)'];
                    $categories_count = mysqli_fetch_assoc($categories_query_results)['COUNT(*)'];
                    
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
                                <div class='huge'><?php echo($posts_count);?></div>
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
                                    <div class='huge'><?php echo($comments_count);?></div>
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
                                    <div class='huge'><?php echo($users_count);?></div>
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
                                        <div class='huge'><?php echo($categories_count);?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adm_categories.php">
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
                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php 
// TODO: find better things to track, maybe posts that have views, comments etc.  
                                //loop through an array to populate chart data 
                                $element_text = ['Active Posts', 'Comments', 'Users', 'Categories'];
                                $element_count = [$posts_count, $comments_count, $users_count, $categories_count];

                                for($i = 0; $i < 4; $i++){
                                    echo "['{$element_text[$i]}'" . " , {$element_count[$i]}],";
                                }
                            ?>
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnChart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnChart_material" style="width: 'auto'; height: 500px;"></div>
                </div>

            </div>
        <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<!-- footer -->
<?php include "includes/adm_foot.php";?>



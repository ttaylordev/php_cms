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
// TODO: I should query much of this once, and store it on the a back end variable?

                    // generic counts
                    $query_posts = "SELECT COUNT(*) FROM posts";
                    $query_users = "SELECT COUNT(*) FROM users";
                    $query_comments = "SELECT COUNT(*) FROM comments";
                    $query_categories = "SELECT COUNT(*) FROM categories";

                    $posts_query_submittal = mysqli_query($connection, $query_posts);
                    $users_query_submittal = mysqli_query($connection, $query_users);
                    $comments_query_submittal = mysqli_query($connection, $query_comments);
                    $categories_query_submittal = mysqli_query($connection, $query_categories);

                    $posts_count = mysqli_fetch_assoc($posts_query_submittal)['COUNT(*)'];
                    $users_count = mysqli_fetch_assoc($users_query_submittal)['COUNT(*)'];
                    $comments_count = mysqli_fetch_assoc($comments_query_submittal)['COUNT(*)'];
                    $categories_count = mysqli_fetch_assoc($categories_query_submittal)['COUNT(*)'];

                    // post status counts
                    $query_post_draft_status = "SELECT COUNT(*) FROM posts WHERE UPPER(post_status) = UPPER('draft')";
                    $query_post_published_status = "SELECT COUNT(*) FROM posts WHERE UPPER(post_status) = UPPER('published')";
                    $query_post_denied_status = "SELECT COUNT(*) FROM posts WHERE UPPER(post_status) = UPPER('denied')";

                    $post_draft_status = mysqli_query($connection, $query_post_draft_status);
                    $post_published_status = mysqli_query($connection, $query_post_published_status);
                    $post_denied_status = mysqli_query($connection, $query_post_denied_status);

                    $post_draft_status_count = mysqli_fetch_assoc($post_draft_status)['COUNT(*)'];
                    $post_published_status_count = mysqli_fetch_assoc($post_published_status)['COUNT(*)'];
                    $post_denied_status_count = mysqli_fetch_assoc($post_denied_status)['COUNT(*)'];

                    // comment status counts
                    $query_comment_pending_status = "SELECT COUNT(*) FROM comments WHERE UPPER(comment_status) = UPPER('pending')";
                    $comment_pending_status = mysqli_query($connection, $query_comment_pending_status);
                    $comment_pending_status_count = mysqli_fetch_assoc($comment_pending_status)['COUNT(*)'];
                    
                    $query_comment_approved_status = "SELECT COUNT(*) FROM comments WHERE UPPER(comment_status) = UPPER('approved')";
                    $comment_approved_status = mysqli_query($connection, $query_comment_approved_status);
                    $comment_approved_status_count = mysqli_fetch_assoc($comment_approved_status)['COUNT(*)'];

                    $query_comment_denied_status = "SELECT COUNT(*) FROM comments WHERE UPPER(comment_status) = UPPER('denied')";
                    $comment_denied_status = mysqli_query($connection, $query_comment_denied_status);
                    $comment_denied_status_count = mysqli_fetch_assoc($comment_denied_status)['COUNT(*)'];

                    $query_subscribers = "SELECT COUNT(*) FROM users WHERE UPPER(user_status) = UPPER('subscriber')";
                    $query_subscriber_role = mysqli_query($connection, $query_subscribers);
                    $user_subscriber_count = mysqli_fetch_assoc($query_subscriber_role)['COUNT(*)'];
                                        
                    $query_arr = [
                        $posts_query_submittal,
                        $users_query_submittal,
                        $comments_query_submittal,
                        $categories_query_submittal,
                        $post_draft_status,
                        $query_post_published_status,
                        $query_post_denied_status,
                        $comment_pending_status,
                        $query_comment_approved_status,
                        $query_comment_denied_status,
                        $query_subscriber_role
                    ];
                    
                    foreach($query_arr as $query){
                        confirm_query($connection, $query);
                    }
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
                        
                        // TODO: find better things to track, maybe posts that have views, comments etc.  
                                                        //loop through an array to populate chart data 
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                <?php
                                    $element_text = [
                                        'All Posts',
                                        'Published',
                                        'Drafts',
                                        'Denied',
                                        'Subs',
                                        'All Comments',
                                        'Pending',
                                        'Approved',
                                        'Denied',
                                        'Users',
                                        'Categories'
                                    ];
                                    $element_count = [
                                        $posts_count,
                                        $post_published_status_count,
                                        $post_draft_status_count,
                                        $post_denied_status_count,
                                        $user_subscriber_count,
                                        $comments_count,
                                        $comment_pending_status_count,
                                        $comment_approved_status_count,
                                        $comment_denied_status_count,
                                        $users_count,
                                        $categories_count
                                    ];
                                    for($i = 0; $i < count($element_text) || $i < count($element_count); $i++){
                                        echo "['{$element_text[$i]}', {$element_count[$i]}], ";
                                    }
                                ?>
                        ]);

                        var options = {
                            // fontSize: 4,
                            chart: {
                                title: '',
                                subtitle: '',
                            },
                            // annotations: {
                            //     textStyle: {
                            //         fontSize: 4
                            //     }
                            // },
                            // legend: {
                            //     textStyle: {
                            //         fontSize: 4
                            //     }
                            // },
                            // axes: {
                            //     textStyle: {
                            //         fontSize: 4
                            //     }
                            // },
                            hAxis : {   
                                textStyle : {
                                    fontSize: 5 // or the number you want
                                }   
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnChart_material'));
                        console.log(google.charts.Bar.convertOptions(options));

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



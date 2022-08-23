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
                        Comments
                        <br>

                        <?php
                        // if (isset($_GET['id'])) {
                        //     $post_id = mysqli_real_escape_string($connection, $_GET['id']);

                        //     $id_title_query = "SELECT post_title FROM posts WHERE post_id = $post_id";
                        //     $get_post_title = mysqli_query($connection, $id_title_query);
                        //     $fetched_title = mysqli_fetch_object($get_post_title);
                        //     $post_title = ucfirst($fetched_title->post_title);

                        //     echo "<h3> $post_title</h3>";
                        // }

                        ?>
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Deny</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (isset($_GET['id'])) :

                                $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']);
                                $get_all_comments = mysqli_query($connection, $query);

                                $post_id = '';

                                if (!$get_all_comments) {
                                    echo "Query unsuccessful";
                                } else {

                                    while ($row = mysqli_fetch_assoc($get_all_comments)) :
                                        $comment_id = $row['comment_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_email = $row['comment_email'];
                                        $comment_status = $row['comment_status'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_date = $row['comment_date'];
                                        $comment_content = $row['comment_content'];
                                        $comment_in_response_to = $row['in_response_to_id'];
                                        $comment_post_id = $row['comment_post_id'];

                                        $post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                        $get_post_id = mysqli_query($connection, $post_query);

                                        if (!$get_post_id) {
                                            echo "Post ID query failed" . mysqli_error($connection);
                                        } else {
                                            while ($row = mysqli_fetch_assoc($get_post_id)) {
                                                $post_id = $row['post_id'];
                                                $post_title = $row['post_title'];
                                                $comment_in_response_to = $row['post_title'];
                                            }
                                        }
                            ?>

                                        <tr>
                                            <td><?php echo $comment_id ?></td>
                                            <td><?php echo $comment_author ?></td>
                                            <td><?php echo $comment_content ?></td>
                                            <td><?php echo $comment_date ?></td>
                                            <td><?php echo $comment_email ?></td>
                                            <td><?php echo $comment_status ?></td>

                                            <td><a href="adm_view_post_comments.php?approve=<?php echo $comment_id?>&id=<?php echo $_GET['id']?>"><i class='far fa-thumbs-up'></i> Approve</a></td>
                                            <td><a href="adm_view_post_comments.php?deny=<?php echo $comment_id ?>&id=<?php echo $_GET['id']?>"><i class='far fa-thumbs-down'></i> Deny</a></td>
                                            <td><a href="adm_view_post_comments.php?delete=<?php echo $comment_id ?>&id=<?php echo $_GET['id']?>"><i class='fas fa-trash'></i> Delete</a></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <!-- // the & divides values for multiple parameters -->
                                <?php } ?>
                            <?php endif; ?>

                            <?php

                            if (isset($_GET['deny'])) {

                                $deny_comment_id = $_GET['deny'];

                                $query = "UPDATE comments SET comment_status = 'denied' WHERE comment_id = $deny_comment_id ";
                                $deny_query = mysqli_query($connection, $query);

                                confirm_query($deny_query);
                                // reload the page
                                header("Location: adm_view_post_comments.php?id=" . $_GET['id'] ."");
                            }

                            if (isset($_GET['approve'])) {

                                $approve_comment_id = $_GET['approve'];

                                $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id ";
                                $approve_query = mysqli_query($connection, $query);

                                confirm_query($approve_query);
                                // reload the page
                                header("Location: adm_view_post_comments.php?id=" . $_GET['id'] ."");
                            }

                            if (isset($_GET['delete'])) {

                                $del_comment_id = $_GET['delete'];

                                $query = "DELETE FROM comments WHERE comment_id = {$del_comment_id}";
                                $delete_query = mysqli_query($connection, $query);

                                confirm_query($delete_query);
                                // reload the page
                                header("Location: adm_view_post_comments.php?id=" . $_GET['id'] ."");
                            }

                            ?>
                        </tbody>
                    </table>

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
<!-- <div class = "edit-grid-wrapper"> -->
<?php

if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $post_value_id) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

            case 'pending':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

            case 'archive':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

            case 'deny':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

            case 'clone':
                $select_post_query = "SELECT * FROM posts WHERE post_id = '{$post_value_id}' ";
                $clone_post_query = mysqli_query($connection, $select_post_query);

            case 'reset_views_count':
                $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $post_value_id";
                $update_to_published_status = mysqli_query($connection, $query);
                break;

                while ($row = mysqli_fetch_assoc($clone_post_query)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_cat_id = $row['post_cat_id'];
                    $post_category = $row['post_category'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_views_count = $row['post_views_count'];
                    $post_content = $row['post_content'];
                }

                $insert_post_clone = "INSERT INTO posts(post_cat_id, post_category, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
                $insert_post_clone .= " VALUE({$post_cat_id},'{$post_category}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";

                $copy_query = mysqli_query($connection, $insert_post_clone);

                if (!$copy_query) {
                    die("Query Failed: \n" . mysqli_error($connection));
                }
                break;
        }
    }
}

?>


<form action="" method="post">
    <table class="table table-bordered table-hover">

        <div class="col-xs-4" id="bulkOptionsContainer">
            <!-- <label for="filter-by">Filter posts by..</label> -->

            <select class="form-control" name="bulk_options" id="action_select">
                <!-- <option value="none" selected disabled hidden></option> -->
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="pending">Pending</option>
                <option value="draft">Draft</option>
                <option value="archive">Archive</option>
                <option value="deny">Deny</option>
                <option value="clone">Clone</option>
                <option value="reset_views_count">Reset Views Count</option>
            </select>

        </div>

        <div id="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Views</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $posts_query = mysqli_query($connection, $query);

            if (!$posts_query) {
                echo "Query unsuccessful";
            } else {

                while ($row = mysqli_fetch_assoc($posts_query)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_cat_id = $row['post_cat_id'];
                    $post_category = $row['post_category'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_views_count = $row['post_views_count'];

                    $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                    $select_update_cat_id = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_update_cat_id)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<tr>";
            ?>

                        <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value='<?php echo $post_id; ?>'></td>

            <?php
                        $comment_query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                        $send_comment_query = mysqli_query($connection, $comment_query);

                        $count_comments = mysqli_num_rows(($send_comment_query));

                        $row = mysqli_fetch_array($send_comment_query);

                        $comment_id = $row['comment_id'] ?? '';

                        echo "
                        <td>{$post_id}</td>
                        <td>{$post_author}</td>
                        <td><a href='../post.php?view_by_post={$post_id}'>{$post_title}</a></td>
                        <td>{$cat_title}</td>
                        <td>{$post_status}</td>
                        <td><img src='../images/{$post_image}' alt='{$post_image}' width='100'</td>
                        <td>{$post_tags}</td>
                        <td><a href='./adm_view_post_comments.php?id=$post_id'>$count_comments</a></td>
                        
                        <td>$post_views_count</a></td>
                        <td>{$post_date}</td>
                        <td><a href='posts.php?source=edit_post&p_id={$post_id}'><i class='far fa-edit'></i> Edit</a></td> 
                        <td><a onClick=\"javascript: return confirm('Delete post?'); \" href='posts.php?delete={$post_id}'> Delete</a></td>
                        </tr>";
                    } // the & divides values for multiple parameters
                }
            }

            if (isset($_GET['delete'])) {

                $del_post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
                $delete_query = mysqli_query($connection, $query);

                confirm_query($delete_query);
                header("Location: posts.php");
            }

            ?>
        </tbody>
    </table>
</form>
<!-- </div> -->
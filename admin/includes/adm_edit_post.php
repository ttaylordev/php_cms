<?php

if (isset($_GET['p_id'])) {
    $get_p_id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id = $get_p_id";
    $select_posts = mysqli_query($connection, $query);

    confirm_query($select_posts);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_cat_id = $row['post_cat_id'];
        $post_category = $row['post_category'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_date = $row['post_date'];
        $post_comment_count = $row['post_comment_count'];
        $post_views_count = $row['post_views_count'];
        $post_content = $row['post_content'];
    }
}

if (isset($_POST['edit_this_post'])) {

    $q_post_title = mysqli_real_escape_string($connection, $_POST['title']);
    $q_post_author = mysqli_real_escape_string($connection, $_POST['author']);
    $q_post_category_id = mysqli_real_escape_string($connection, $_POST['post_category']);
    $q_post_status = mysqli_real_escape_string($connection, $_POST['status']);
    $post_image_new = mysqli_real_escape_string($connection, $_FILES['image']['name']);
    $post_image_temp = mysqli_real_escape_string($connection, $_FILES['image']['tmp_name']);
    $q_post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
    $q_post_content = mysqli_real_escape_string($connection, $_POST['post_content']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    // checks to see if the image has been updated, else it keeps the image from the query.
    if (!empty($post_image_new)) {
        $post_image = $post_image_new;
    }

    $query = "UPDATE posts SET ";
    $query .= "post_cat_id = {$q_post_category_id}, ";
    $query .= "post_title = '{$q_post_title}', ";
    $query .= "post_author = '{$q_post_author}', ";
    $query .= "post_date = now(), ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_content = '{$q_post_content}', ";
    $query .= "post_tags = '{$q_post_tags}', ";
    $query .= "post_status = '{$q_post_status}' ";
    $query .= "WHERE post_id = {$post_id} ";

    // $prepared_query = mysqli_prepare($connection, $query);

    $edit_posts = mysqli_query($connection, $query);

    confirm_query($edit_posts);
    // success / failure modal would be nice here.
    echo "<p class='bg-success'>Post Updated. <a href='../post.php?view_by_post={$post_id}'> View Post </a> or <a href='posts.php'> Edit Alternative Post</a></p>";
    // header("Location: posts.php?source=edit_post&p_id=$post_id");

}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="title">
    </div>

    <div class="form-group">
        <label for="Post Category Id">Post Category</label><br>
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            confirm_query($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="status" id="">
            <?php
            echo " <option value='$post_status'>$post_status</option>";
            $statuses = array('draft', 'published', 'denied');
            foreach ($statuses as $status) {
                if ($status !== $post_status) {
                    echo "<option value='$status'>$status</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" value="" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags">
    </div>

    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="summernote" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name='edit_this_post' value="Publish">
        <!-- href="posts.php?source=view" -->
    </div>


</form>
<?php


// optional post image or url 

// if 
    // file option set var 
// else 
    // url option set var

//  radio buttons

    if(isset($_POST['create_post'])){

        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_category = '';
        $post_status = $_POST['status'];

        // static hosted images vs url
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        // $post_image = $_POST['image']; //method for storing URL's

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('y-m-d'); //
        // $post_comment_count = 4;

        move_uploaded_file($post_image_temp, "../images/$post_image");


        // TODO: form field validation, not just the title, but all required fields
                // notate required fields with an asterisk or something.

        if($post_title == "" || empty($post_title)){
            echo "This field cannot remain empty";
        } else {
            $post_query = "INSERT INTO posts(post_cat_id, post_category, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
            $post_query .=" VALUE({$post_category_id},'{$post_category}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
            $add_post_query = mysqli_query($connection, $post_query);

            confirm_query($add_post_query);
            header("Location: posts.php?source=add_post");
        }
    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    
    <div class="form-group">
        <label for="Post Category"></label>
        <br>
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                
                confirm_query($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>"; 
                }

            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="status" id=""> 
            <?php
                echo " <option value='$post_status'>$post_status</option>";  
                $statuses = array('draft','published','denied');
                foreach($statuses as $status){
                    if($status !== $post_status){
                        echo "<option value='$status'>$status</option>";  
                    }
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
    </div>
 

</form>


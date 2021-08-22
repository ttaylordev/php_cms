<?php

    if(isset($_POST['create_user'])){

        $user_name = $_POST['name'];
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = '';
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        $user_date = date('y-m-d'); 
        $user_status = $_POST['status'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if($user_name == "" || empty($user_name)){
            echo "This field cannot remain empty";
        } else {
            $user_query = "INSERT INTO users(user_name, user_firstname, user_lastname, user_date, user_image, user_email, user_role, user_status, user_password) ";
            $user_query .=" VALUE('{$user_name}', '{$user_firstname}', '{$user_lastname}', now(), '{$user_image}', '{$user_email}', '{$user_role}', '{$user_status}', {'$user_password'}) ";
            $add_user_query = mysqli_query($connection, $user_query);

            confirm_query($add_user_query);
            header("Location: users.php?source=add_user");
        }
    }

?>

<form action="" method="user" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">user name</label>
        <input type="text" class="form-control" name="name">
    </div>
    
    <div class="form-group">
        <select name="user_category" id="">

            <?php
                $query = "SELECT * FROM users";
                $select_role = mysqli_query($connection, $query);
                
                confirm_query($select_role);

                while($row = mysqli_fetch_assoc($select_role)){
                    $user_name = $row['user_name'];
                    $user_id = $row['user_id'];

                    echo "<option value='{$user_id}'>{$user_name}</option>"; 
                }

            ?>

        </select>
    </div>
    
    <div class="form-group">
        <label for="author">user Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="user_status">user Status</label>
        <input type="text" class="form-control" name="status">
    </div>

    <div class="form-group">
        <label for="user_image">user Image</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="user_tags">user Tags</label>
        <input type="text" class="form-control" name="user_tags">
    </div>

    <div class="form-group">
        <label for="user_content">user Content</label>
        <textarea type="text" class="form-control" name="user_content" id="" cols="30" rows="10">
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Publish">
    </div>
 

</form>


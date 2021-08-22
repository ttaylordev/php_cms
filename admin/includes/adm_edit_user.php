<?php

    if(isset($_GET['u_id'])){
        $get_u_id = $_GET['u_id'];

        $query = "SELECT * FROM users WHERE user_id = $get_u_id";
        $select_users = mysqli_query($connection, $query);

        confirm_query($select_users);
        
        while($row = mysqli_fetch_assoc($select_users)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_date = $row['user_date'];
            $user_status = $row['user_status'];
            $user_post_count = $row['user_post_count'];
            $user_comment_count = $row['user_comment_count'];
            $user_views_count = $row['user_views_count'];
            $user_password = $row['user_password'];
        }
    }

    if(isset($_POST['edit_this_user'])){

        $user_name = $_POST['username'];
        $user_firstname = $_POST['firstname'];        
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = $_POST['role'];
        $user_status = $_POST['status'];
        $user_password = $_POST['user_password'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if(!empty($user_image_new)){
            $user_image = $user_image_new;
        }

        $query = "UPDATE users SET ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_status = '{$user_status}' ";
        $query .= "WHERE user_id = {$user_id} ";
       
        $edit_users = mysqli_query($connection, $query);

        confirm_query($edit_users);
        header("Location: users.php?source=edit_user&u_id=$user_id");
    }


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" value="<?php echo $user_name; ?>" name="username">
    </div>

    <!-- role -->
    <div class="form-group">
        <label for="user role">Role</label>
        <select name="role" id="">
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
            <option value='author'>Author</option>  
        </select>
    </div>

    <!-- status -->
    <div class="form-group">
        <label for="user status">Status</label>
        <select name="status" id="">
            <option value='approved'>Approved</option>
            <option value='denied'>Denied</option>
            <option value='pending'>Pending</option>
        </select>
    </div>

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="firstname">
    </div>

    <div class="form-group">
        <label for="firstname">Lastname</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="lastname">
    </div>

    <div class="form-group">
        <label for="firstname">Email</label>
        <input type="text" class="form-control" value="<?php echo $user_email; ?>" name="email">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" value="" name="image">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="text" class="form-control" name="user_password">
        </input>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_this_user" value="Publish" >
    </div>

</form>
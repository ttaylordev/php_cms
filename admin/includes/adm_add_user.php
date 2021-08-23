<?php

    if(isset($_POST['add_user'])){

        $user_name = $_POST['username'];
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = $_POST['role'];
        $user_date = date('y-m-d'); 
        $user_status = $_POST['status'];
        $user_password = $_POST['password'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if($user_name == "" || empty($user_name)){
            echo "This field cannot remain empty";
        } else {
            $user_query = "INSERT INTO users(user_name, user_firstname, user_lastname, user_date, user_image, user_email, user_role, user_status, user_password) ";
            $user_query .=" VALUES('{$user_name}', '{$user_firstname}', '{$user_lastname}', now(), '{$user_image}', '{$user_email}', '{$user_role}', '{$user_status}', '{$user_password}') ";
            $add_user_query = mysqli_query($connection, $user_query);

            confirm_query($add_user_query);
            header("Location: users.php?source=view_users");
        }
    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
    <label for="user role">Role</label>
        <select name="role" id="">
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
            <option value='author'>Author</option>  
        </select>
    </div>

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
        <input type="text" class="form-control" name="firstname">
    </div>
    
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="image">Profile Picture</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
    </div>
 

</form>


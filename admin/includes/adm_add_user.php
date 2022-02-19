<?php

if (isset($_POST['add_user'])) {

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

    if ($user_name == "" || empty($user_name)) {
        echo "This field cannot remain empty";
    } else {
        $user_query = "INSERT INTO users(user_name, user_firstname, user_lastname, user_date, user_image, user_email, user_role, user_status, user_password) ";
        $user_query .= " VALUES('{$user_name}', '{$user_firstname}', '{$user_lastname}', now(), '{$user_image}', '{$user_email}', '{$user_role}', '{$user_status}', '{$user_password}') ";
        $add_user_query = mysqli_query($connection, $user_query);

        confirm_query($add_user_query);
        echo "User Created: " . " <a href='user.php'>View Users</a> ";
        // header("Location: users.php?source=view_users");
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_role">User role</label><br>
        <select name="role" id="">
            <?php
            echo " <option value='$user_role'>$user_role</option>";
            $roles = array('Admin', 'Subscriber', 'Author');
            foreach ($roles as $role) {
                if ($role !== $user_role) {
                    echo "<option value='$role'>$role</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="user_status">User Status</label><br>
        <select name="status" id="">
            <?php
            echo " <option value='$user_status'>$user_status</option>";
            $statuses = array('draft', 'published', 'denied');
            foreach ($statuses as $status) {
                if ($status !== $user_status) {
                    echo "<option value='$status'>$status</option>";
                }
            }
            ?>
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
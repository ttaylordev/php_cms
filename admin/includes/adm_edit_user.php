<?php

// get user data from DB+
if (isset($_GET['u_id'])) {

    $get_u_id = $_GET['u_id'];

    $get_user_query = "SELECT * FROM users WHERE user_id = $get_u_id";
    $select_user = mysqli_query($connection, $get_user_query);

    confirm_query($select_user);

    while ($row = mysqli_fetch_assoc($select_user)) {
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
        $user_password_stored = $row['user_password'];
    }

    // get user data from form
    if (isset($_POST['edit_this_user'])) {

        $user_name = mysqli_real_escape_string($connection, $_POST['username']);
        $user_firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $user_lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $user_email = mysqli_real_escape_string($connection, $_POST['email']);
        $user_image_new = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = mysqli_real_escape_string($connection, $_POST['role']);
        $user_status = mysqli_real_escape_string($connection, $_POST['status']);
        if (isset($_POST['user_password'])) {
            $user_password_entered =  mysqli_real_escape_string($connection, $_POST['user_password']);
        }

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if (!empty($user_image_new)) {
            $user_image = $user_image_new;
        }

        if (!empty($user_password_entered)) {
            $hash = PASSWORD_DEFAULT;
            $cost = array('cost' => "12");
            $user_password_hashed = password_hash($user_password_entered, $hash, $cost);
        }

        $query_set = "UPDATE users SET ";
        $query_set .= "user_name = '{$user_name}', ";
        $query_set .= "user_firstname = '{$user_firstname}', ";
        $query_set .= "user_lastname = '{$user_lastname}', ";
        $query_set .= "user_email = '{$user_email}', ";
        $query_set .= "user_image = '{$user_image}', ";
        $query_set .= "user_role = '{$user_role}', ";
        $query_set .= "user_status = '{$user_status}'";
        if (isset($user_password_hashed)) {
            $query_set .= ", user_password = '{$user_password_hashed}' ";
        }
        $query_set .= " WHERE user_id = {$user_id} ";

        $edit_users_query = mysqli_query($connection, $query_set);

        confirm_query($edit_users_query);
        echo "User {$user_name} has been updated" . " <a href='users.php'>View users</a> <br></br>";
        // header("Location: users.php?source=edit_user&u_id=$user_id");

    }
} else {
    header("Location: index.php");
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" value="<?php echo $user_name; ?>" name="username">
    </div>

    <!-- role -->
    <div class="form-group">
        <label for="user role">Role</label><br>
        <select name="role" id="">
            <?php
            echo " <option value='$user_role'>$user_role</option>";

            $roles = array('admin', 'subscriber', 'author');
            foreach ($roles as $role) {
                if ($role !== $user_role) {
                    echo "<option value='$role'>$role</option>";
                }
            }
            ?>
        </select>
    </div>

    <!-- status -->
    <div class="form-group">
        <label for="user status">Status</label>
        <br>
        <select name="status" id="">
            <?php
            echo " <option value='$user_status'>$user_status</option>";

            $statuses = array('approved', 'pending', 'denied');
            foreach ($statuses as $status) {
                if ($status !== $user_status) {
                    echo "<option value='$status'>$status</option>";
                }
            }
            ?>
        </select>

    </div>
    <option value="author">Author</option>
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="lastname">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="email">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" value="" name="image">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" autocomplete="off">
        </input>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_this_user" value="Publish">
    </div>

</form>
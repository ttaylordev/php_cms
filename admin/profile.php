<?php include "includes/adm_head.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adm_nav.php"; ?>
    <?php

    if (isset($_SESSION['username'])) {

        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE user_name = '{$username}' ";

        $select_user_profile = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_user_profile)) {
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

    if (isset($_POST['edit_profile'])) {

        $user_name = $_POST['username'];
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $user_image_new = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        if (isset($_POST['role']) && !empty($_POST['role'])) {
            $user_role = $_POST['role'];
        }
        $user_status = $_POST['status'];
        if (isset($_POST['user_password']) && !empty($_POST['user_password'])) {
            $user_password_entered = $_POST['user_password'];
        }

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if (!empty($user_image_new)) {
            $user_image = $user_image_new;
        }

        if (isset($user_password_entered)) {
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
        if (isset($_POST['role']) && !empty($_POST['role'])) {
            $query_set .= "user_role = '{$user_role}', ";
        }
        $query_set .= "user_status = '{$user_status}' ";

        if (isset($user_password_hashed)) {
            $query_set .= ", user_password = '{$user_password_hashed}' ";
        }
        // $query_set .= "user_password = '{$user_password}' ";

        $query_set .= "WHERE user_id = {$user_id} ";

        $edit_users = mysqli_query($connection, $query_set);

        confirm_query($edit_users);
        // header("Location: users.php?source=edit_user&u_id=$user_id");
    }

    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome <?php echo $username; ?>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_name">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="username" value="<?php echo $user_name; ?>">
                        </div>

                        <!-- role -->
                        <div class="form-group">
                            <label for="user role">Role</label>
                            <?php
                            if (isset($user_role) && $user_role === 'admin') {

                                echo "<select name='role' id='role_field'>";
                                echo " <option value='$user_role'>$user_role</option>";
                                $roles = array('admin', 'subscriber', 'author');
                                foreach ($roles as $role) {
                                    if ($role !== $user_role) {
                                        echo "<option value='$role'>$role</option>";
                                    }
                                }
                                echo "</select>";
                            }

                            ?>
                        </div>

                        <!-- status -->
                        <div class="form-group">
                            <label for="user status">Status</label>
                            <select name="status" id="status_field">
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
                            <input type="email" class="form-control" autocomplete="email" value="<?php echo $user_email; ?>" name="email">
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
                            <input type="submit" class="btn btn-primary" name="edit_profile" value="Update Profile">
                        </div>

                    </form>
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
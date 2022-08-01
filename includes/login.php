<?php
$path = $_SERVER['DOCUMENT_ROOT'] . "/cms";
include $path . '/includes/read_file.php';
?>

<?php include $path . "/includes/db.php"; ?>
<?php session_start(); ?>
<?php include $path . "/includes/functions.php"; ?>
<?php include $path . "/admin/functions.php"; ?>
<?php

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cleans up the form data
    mysqli_real_escape_string($connection, $username);
    mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    confirm_query($select_user_query);

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
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
    }

    $authenticated = password_verify($password, $user_password);

    if (!$authenticated) {
        $_SESSION['username'] = '';
        $_SESSION['firstname'] = '';
        $_SESSION['lastname'] = '';
        $_SESSION['role'] = '';
        header("Location: ../index.php");
        // echo "one";
    } else if ($authenticated && $user_role === 'admin') {
        $_SESSION['username'] = $user_name;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['role'] = $user_role;
        header("Location: ../admin");
        // echo "two";
    } else if ($authenticated && $user_role !== 'admin') {
        $_SESSION['username'] = $user_name;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['role'] = $user_role;
        header("Location: ../index.php");
        // echo "three";
    }
} else {
    echo "login has failed, retry";
}

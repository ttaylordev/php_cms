<?php include "includes/head.php"; ?>

<?php
// if(isset($_POST['register_btn'])){

// }


if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // form completeness conditional
    if (!empty($username) && !empty($email) && !empty($password)) {

        // SQL injection protective measure
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        // crypt and salt
        $query = "SELECT user_randSalt FROM users";
        $sel_randsalt_query = mysqli_query($connection, $query);

        // salt fail check
        if (!$sel_randsalt_query) {
            die("Query failed" . mysqli_error($connection));
        }

        $salt = mysqli_fetch_array($sel_randsalt_query);
        $salt = $salt['user_randSalt'];
        $saltedpw = crypt($salt, $password);

        $query = "INSERT INTO users (user_name, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$email}', '{$saltedpw}', 'subscriber')";

        $register_user_query = mysqli_query($connection, $query);

        if (!$register_user_query) {
            die("System: Failed to register user " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }
        $confirmation = "Your registration has been submitted";
    } else {
        $confirmation = '';
        echo "<script> alert('All fields must be completed');</script>";
    }
}

?>

<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <h6 class="text-center"><?php echo $confirmation; ?></h6>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>

    <?php include "includes/foot.php"; ?>

    <!-- TODO: clean inputs, encrypt, HTTP POST to db.  -->
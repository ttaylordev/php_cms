<?php
session_start();
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
// $_SESSION['role'] = null;
unset($_SESSION['role']);
header("Location: ../../cms/index.php");


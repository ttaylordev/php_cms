<?php
$pw = $passphrass;

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = $pw;
$db['db_name'] = 'cms';

// instantiates each variable to as a constant
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection == false) {
    echo "failed to establish connection";
}

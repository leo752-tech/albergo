<?php

//Database Connection

define('DB_HOST', 'localhost');
define('DB_NAME', 'hotel_db');
define('DB_USER', 'root');
define('DB_PASS', '');
//root

//session coockie expiration
define('COOKIE_EXP_TIME', 1800); // 30 minutes in seconds

//credenziali admin
define('EMAIL_ADMIN', 'hotel_reservation@gmail.com');

$password = 'password';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
define('PASSWORD_ADMIN', $hashedPassword);


<?php

//Database Connection

define('DB_HOST', 'localhost');
define('DB_NAME', 'my_hotelreservation');
define('DB_USER', 'hotelreservation');
define('DB_PASS', '');
//root

//session coockie expiration
define('COOKIE_EXP_TIME', 1800); // 30 minutes in seconds
/*
//pk_test_
define("publicKey", "pk_test_...");
//sk_test_
define("privateKey", "sk_test_...");*/
//credenziali admin
define('EMAIL_ADMIN', 'hotel_reservation@gmail.com');

$password = 'password';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
define('PASSWORD_ADMIN', $hashedPassword);


<?php

//Database Connection
define('DB_HOST', 'localhost');
define('DB_NAME', 'hotel_db');
define('DB_USER', 'root');
define('DB_PASS', '');


//session coockie expiration
define('COOKIE_EXP_TIME', 2592000); // 30 days in seconds
//pk_test_
define("publicKey", "pk_test_...");
//sk_test_
define("privateKey", "sk_test_...");
//credenziali admin
define('EMAIL_ADMIN', 'hotel_reservation@gmail.com');

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
define('PASSWORD_ADMIN', $hashedPassword);


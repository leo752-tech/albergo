<?php


require_once __DIR__ . '/classes/utility/USession.php';
require_once __DIR__ . '/classes/utility/UAuth.php'; 

USession::getInstance();
UAuth::logout();


header('Location: index.php');
exit();
?>
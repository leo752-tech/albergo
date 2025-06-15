<?php
require_once(__DIR__ . '/../app/utility/autoloader.php');
require_once(__DIR__ . '/../app/config/config.php');
require_once(__DIR__ . '/../app/installation/StartSmarty.php');

$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);
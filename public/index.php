<?php
require_once(__DIR__ . '/../app/utility/autoloader.php');
require_once(__DIR__ . '/../app/config/config.php');

$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);
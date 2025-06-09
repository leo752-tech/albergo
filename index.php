<?php
require_once 'app/utility/autoloader.php';

$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);
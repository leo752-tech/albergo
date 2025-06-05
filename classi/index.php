include_once "classi\utility\autoloader.php";

$u = new EUser(null, "leonardo", "colucci", new DateTime("1999-04-28"), "L'aquila");
$r = FPersistentManager::getInstance()->saveObject($u);
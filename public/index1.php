<?php

require(__DIR__ . '/../app/utility/autoloader.php');

$ob = FPersistentManager::getInstance()->getObject('ERegisteredUser',2);
$mod = array(['isBanned', true]);
$result = FPersistentManager::getInstance()->updateObject($ob, $mod);
if($result){echo 'BELLA';}
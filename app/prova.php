<?php

require_once 'C:\Users\Federico\OneDrive\Desktop\new\albergo\app\Utility\autoloader.php';
$u1= new ERegisteredUser(null,11,'fedepalme@live.it','federico','Federico','Palmerini',new DateTime('2002-01-25'),'Pescara');
//$r = FPersistentManager::getInstance()->saveObject($u1);
//$m=[['price', 49.99]];
//$r = FPersistentManager::getInstance()->updateObject(FPersistentManager::getInstance()->getObject('EExtraService', 5),$m);
$r = FPersistentManager::getInstance()->saveObject($u1);

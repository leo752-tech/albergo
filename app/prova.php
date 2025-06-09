<?php

require_once 'C:\Users\Federico\OneDrive\Desktop\new\albergo\classi\Utility\autoloader.php';
//$u1= new EExtraService(null,'spa', 'massaggi e sauna', 59.99);
//$r = FPersistentManager::getInstance()->saveObject($u1);
//$m=[['price', 49.99]];
//$r = FPersistentManager::getInstance()->updateObject(FPersistentManager::getInstance()->getObject('EExtraService', 5),$m);
$r = FPersistentManager::getInstance()->deleteObject('EExtraService',5);

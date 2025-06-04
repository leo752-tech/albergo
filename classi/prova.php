<?php

require_once 'C:\Users\Federico\OneDrive\Desktop\new\albergo\classi\Utility\autoloader.php';
$u1= new EBooking(null,4, new dateTime('2023-10-01'), new DateTime('2023-10-05'),2, 500.00, null);
$r = FPersistentManager::getInstance()->saveObject($u1);
//$r = FPersistentManager::getInstance()->updateObject(FPersistentManager::getInstance()->getObject('ERoom', 2),$m);
//$r = FPersistentManager::getInstance()->deleteObject('ERoom',4);
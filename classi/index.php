<?php

include_once "C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\utility\autoloader.php";

$b1 = new EBooking(null,3, new DateTime("01-07-2025"), new DateTime("10-07-2025"),12, 100.0, null);
//$result = FPersistentManager::getInstance()->saveObject($b1);
$b2 = new EBooking(null,3, new DateTime("01-08-2025"), new DateTime("10-08-2025"),12, 150.0, null);
//$result = FPersistentManager::getInstance()->saveObject($b2);

//$rooms = CBooking::getAvailableRooms(new DateTime("2025-07-05"), new DateTime("2025-08-05"), 3);

//foreach($rooms as $room){echo $room->getName();}

$data1 = new DateTime("2025-01-01");

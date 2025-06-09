<?php

include_once "C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\utility\autoloader.php";

$result = FPersistentManager::getInstance()->getObject("EBooking",18);
$checkIn = $result->getCheckInDate(); 
$checkOut = $result->getCheckOutDate(); 
$requestIn = new DateTime("2026-01-25");
$requestOut = new DateTime("2026-02-02");

$rooms = CBooking::getAvailableRooms($requestIn, $requestOut, 4);
foreach($rooms as $room){
    echo $room->getName() . "<br>";
}

/*
$r = CBooking::isAvailableRoom($requestIn, $requestOut, $checkIn, $checkOut);
if($r==true){echo "DISPONIBILE";}
else{echo "OCCUPATA";}*/
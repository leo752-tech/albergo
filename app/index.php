<?php

//include_once "C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\utility\autoloader.php";
include_once 'C:\Users\Federico\OneDrive\Desktop\new\albergo\app\utility\autoloader.php';

$result = FPersistentManager::getInstance()->getObject("EBooking",2);
$checkIn = $result->getCheckInDate(); 
$checkOut = $result->getCheckOutDate(); 
$requestIn = new DateTime("2026-01-25");
$requestOut = new DateTime("2026-02-02");

$rooms = CBooking::getAvailableRooms($requestIn, $requestOut, 3);
foreach($rooms as $room){
    echo $room->getName() . "<br>";
}

/*
$r = CBooking::isAvailableRoom($requestIn, $requestOut, $checkIn, $checkOut);
if($r==true){echo "DISPONIBILE";}
else{echo "OCCUPATA";}*/
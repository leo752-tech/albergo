<?php

class CCalendar{

    public static function getBookingsByDate(DateTime $date){
        $bookingsDate = array();
        $rooms = FPersistentManager::getInstance()->getAllRooms();
        foreach($rooms as $room){
            $bookings = FPersistentManager::getInstance()->getBookingsByRoom($room["idRoom"]);
            foreach($bookings as $book){
                $occupied = self::isInMiddle($book["checkInDate"], $book["checkOutDate"], $date);
                if($occupied){$bookingsDate[] = $book;}
            }
        }
        return $bookingsDate;
    }

    public static function isInMiddle($checkIn, $checkOut, $date){
        $cI = new DateTime($checkIn);
        $cO = new DateTime($checkOut);
        $dateM = new DateTime($date);
        if($cI <= $dateM && $dateM <= $cO){return true;}
        else{return false;}
    }
    
    

}
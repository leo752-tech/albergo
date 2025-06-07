<?php

class CBooking {

    public function __construct() {}
    //DA VERIDICARE

    public static function getAvailableRooms($requestedCheckIn, $requestedCheckOut, $requestedBeds) {
        $availableRooms = array();
        $rooms = FPersistentManager::getInstance()->getRoomsByBeds($requestedBeds);
        if(count($rooms)>0){
            foreach($rooms as $room){
                $bookings = FPersistentManager::getInstance()->getBookingsByRoom($room->getId());
                echo "PREN: " . count($bookings);
                
                if($bookings!=null){
                    $isAvailable = true;
                    foreach($bookings as $book){
                        $occupiedCheckIn = $book["checkInDate"];
                        $occupiedCheckOut = $book["checkOutDate"];
                        $isAvailable = self::isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut);
                        if($isAvailable==false){break; echo "THIS PERIOD IS ALREADY OCCUPIED";}
                    }
                    if($isAvailable==true){$availableRooms[] = $room;}
                    
                }
                
            
            }

            return $availableRooms;
        }else{
            echo "THERE IS NO ROOM WITH BEDS SELECTED";
            return $availableRooms;
        }
        
    }

    public static function isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut){
        $isAvailable = true;
        $cond1_1 = $occupiedCheckIn <= $requestedCheckIn && $requestedCheckIn <= $occupiedCheckOut;
        $cond1_2 = $occupiedCheckIn <= $requestedCheckOut && $requestedCheckOut <= $occupiedCheckOut;
        $cond1 = $cond1_1 || $cond1_2;

        $cond2 = $requestedCheckIn <= $occupiedCheckIn && $requestedCheckOut >= $occupiedCheckOut;
        if($cond1 == true || $cond2 == true){
            echo "DENTRO";
            $isAvailable = false;
        }
        echo "BOOL: " . $isAvailable;
        return $isAvailable;

    }

    public static function makeBooking(){
        
    }
}
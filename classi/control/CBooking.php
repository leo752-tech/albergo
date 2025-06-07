<?php

class CBooking {

    public function __construct() {}
    //DA VERIDICARE

    public static function getAvailableRooms($requestedCheckIn, $requestedCheckOut, $requestedBeds) {
        $availableRooms = array();
        $rooms = FPersistentManager::getInstance()->getRoomsByBeds($requestedBeds);
        if(!empty($rooms)){
            foreach($rooms as $room){
                $isAvailable = true;
                $bookings = FPersistentManager::getInstance()->getBookingsByRoom($room->getId());
                
                if(!empty($bookings)){
                    
                    foreach($bookings as $book){
                        $occupiedCheckIn = $book["checkInDate"];
                        $occupiedCheckOut = $book["checkOutDate"];
                        if(self::isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut)){
                            echo "THIS PERIOD IS ALREADY OCCUPIED";
                            $isAvailable = false; 
                            break;
                        }
                    }
                }
                if($isAvailable){$availableRooms[] = $room;}
                
            
            }
            
            if(!empty($availableRooms)){return $availableRooms;}
            else{echo "NESSUNA CAMERA DISPONIBILE PER LE DATE SELEZIONATE"; return $availableRooms;}

            
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
            $isAvailable = false;
        }
        echo "BOOL: " . $isAvailable;
        return $isAvailable;

    }

    //DA MODIFICARE IN BASE ALA GRAFICA
    public static function makeBooking(){
        $totalPrice = self::calculatePrice(DateTime $checkIn, DateTime $checkOut, $price, $idExtraService, $idSpecialOffer);
        $book = new EBooking(null, USession::getSessionElement("idRegisteredUser"), DateTime $checkInDate, DateTime $checkOutDate, int $idRoom, float $totalPrice, ?DateTime $bookingDate = null, ?int $idSpecialOffer = null);
        $result = FPersistentManager::getInstance()->saveObject($book);
        if($extraService!=null){
            $result = FPersistentManager::getInstance()->saveObject($book);
            //continua...
        }
    }

    private static function calculatePrice(DateTime $checkIn, DateTime $checkOut, float $price, ?int $idExtraService = null, ?int $idSpecialOffer){
        if($idSpecialOffer!=null){
            //CALCOLARE IN BASE ALL'OFFERTA 
        }elseif($idExtraService!=null){
            $extraService = FPersistentManager::getInstance()->getObject();
            $price +=  $extraService->getPrice();
        }
        
        
        
        $length = $checkIn->diff($checkOut);
        $length = $length->days;
        $totalPrice = $length * $price;
        return $totalPrice;
    }
}
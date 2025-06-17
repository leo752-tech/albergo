<?php

class CBooking {

    public function __construct() {}
    //DA VERIDICARE

    public static function getAvailableRooms($requestedCheckIn, $requestedCheckOut, $requestedBeds) {
        $availableRooms = array();
        
        $rooms = FPersistentManager::getInstance()->getRoomsByBeds($requestedBeds);

        if (empty($rooms)) { 
            echo "THERE IS NO ROOM WITH BEDS SELECTED";
            return $availableRooms; 
        }

        foreach ($rooms as $room) {
            $isRoomCurrentlyAvailable = true; 
            $bookingsForThisRoom = FPersistentManager::getInstance()->getBookingsByRoom($room->getId());

            if (!empty($bookingsForThisRoom)) { 
                foreach ($bookingsForThisRoom as $book) {
                    $occupiedCheckIn  = $book["checkInDate"];
                    $occupiedCheckOut = $book["checkOutDate"];

                    
                    if (!self::isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut)) {
                       
                        $isRoomCurrentlyAvailable = false;
                        
                        break; 
                    }
                }
            }
           
            if ($isRoomCurrentlyAvailable) {
                $availableRooms[] = $room;
            }
        }

     
        if (empty($availableRooms)) {
            echo "NESSUNA CAMERA DISPONIBILE PER LE DATE SELEZIONATE";
        }
        return $availableRooms; 
    }

    public static function isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut){
        
        $reqIn = $requestedCheckIn;
        $reqOut = $requestedCheckOut;
        $occIn = new DateTime($occupiedCheckIn);
        $occOut = new DateTime($occupiedCheckOut);

        $overlaps = ($reqOut >= $occIn && $reqIn <= $occOut);

        return !$overlaps;
    }

    public static function makeBooking(){
        if(CUser::isLogged()){
            $totalPrice = self::calculatePrice(new DateTime(UHTTP::post('checkIn')), new DateTime(UHTTP::post('checkOut')), $price, $idExtraService, $idSpecialOffer);
            if($idSpecialOffer!= null){
                $booking = new EBooking(null, USession::getSessionElement("idUser"), new DateTime(UHTTP::post("checkIn")), new DateTime(UHTTP::post("checkOut")), UHTTP::post("idRoom"), $totalPrice, null, $idSpecialOffer);
                $idBooking = FPersistentManager::getInstance()->saveObject($booking);
            }
            elseif($idExtraService)
            $booking = new EBooking(null, USession::getSessionElement("idUser"), new DateTime(UHTTP::post("checkIn")), new DateTime(UHTTP::post("checkOut")), UHTTP::post("idRoom"), $totalPrice, null, null);
            $idBooking = FPersistentManager::getInstance()->saveObject($booking);
            if(UHTTP::post("idExtraService")!=null){
                $result1 = FPersistentManager::getInstance()->setBookingsExtraService($idBooking, UHTTP::post("idExtraService"));        
            }
        }

        

    }

    private static function calculatePrice(DateTime $checkIn, DateTime $checkOut, float $price, ?int $idExtraService = null, ?int $idSpecialOffer = null){
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
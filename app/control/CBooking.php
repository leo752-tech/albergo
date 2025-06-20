<?php

class CBooking {

    public static function selectDate(){
        $view = new VBooking();
        $view->showSelect();
    }

    public static function showSpecialOffer(){
        $view = new VBooking();
        $specialOffers = FPersistentManager::getInstance()->getAllSpecialOffer();   
        $offersObj = array();
        foreach($specialOffers as $queryRes){
            $offersObj[] = new ESpecialOffer($queryRes["idSpecialOffer"], $queryRes["title"], $queryRes["description"], $queryRes["beds"], $queryRes["length"], $queryRes["specialPrice"]);
        }
        $admin_logged_in = CAdmin::isAdminLogged();
        
        $view->showOffer($admin_logged_in, $offersObj);
    }


    //PER LE PRENOTAZIONI STANDARD
    public static function getAvailableRooms() {
        echo 'GEEEEEEMMMMMMMMMMIIIIIIIIIINNNNNNNNNIIIIIIIIIII' . '<br>';
        $requestedCheckIn = UHTTP::post('data_check_in');
        $requestedCheckOut = UHTTP::post('data_check_out');
        $requestedBeds = UHTTP::post('num_adulti');

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
        print_r($availableRooms);
        return $availableRooms; 
    }

    public static function isRightLength($reqCheckIn, $reqCheckOut, $reqLength){
        $reqCheckIn = new DateTime($reqCheckIn);
        $reqCheckOut = new DateTime($reqCheckOut);
        $length = $reqCheckIn->diff($reqCheckOut)->days;
        if($length != $reqLength){
            //mostra popup
        }else{
            return true;
        }
    }

    //PER LE PRENOTAZIONI CON LE SPECIAL OOFFER
    public static function getAvailableRoomsBySpecialOffer($idSpecialOffer) {
        $requestedCheckIn = UHTTP::post('data_check_in');
        $requestedCheckOut = UHTTP::post('data_check_out');

        $specialOffer = FPPersistentManager::getInstance()->getObject('SpacialOffer', $idSpecialOffer);
        $requestedBeds = $specialOffer->getBeds();

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
                    $requestedLength = $occupiedCheckIn->diff($occupiedCheckOut)->days;

                    $isLength = self::isRightLength($occupiedCheckIn, $occupiedCheckOut, $requestedLength);                    
                    if (!self::isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut) || !$isLength) {
                        
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
        print_r($availableRooms);
        return $availableRooms; 
    }

    public static function isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut){
       
        $reqIn = new DateTime($requestedCheckIn);
        $reqOut = new DateTime($requestedCheckOut);
        $occIn = new DateTime($occupiedCheckIn);
        $occOut = new DateTime($occupiedCheckOut);

        $overlaps = ($reqOut >= $occIn && $reqIn <= $occOut);

        return !$overlaps;
    }

    public static function showSummary($booking){
        if(CUser::isLogged()){
            $view = new VBooking();


            
        }
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
        }else{
            setcookie('redirectSelectedRoom', UHTTP::getReferer(), time() + 900,  "/"); //15 minuti
            header('Location: /~momok/User/showFormLogin');
            exit();
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
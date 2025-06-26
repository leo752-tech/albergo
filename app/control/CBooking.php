<?php

class CBooking {

    public static function selectDate(?int $idOffer = null){
        $view = new VBooking();
        if($idOffer != null){
            USession::getInstance()->setSessionElement('idOffer', $idOffer);
        }
        $view->showSelect($idOffer);
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
    public static function getAvailableRooms(?int $comeBack = null) {
        USession::getInstance();
        
        
        $view = new VBooking();
        $isLoggedIn = CUser::isLogged();
    
        if($comeBack != null){
            $roomsImages = USession::getSessionElement('roomsImages');
            $view->showAvailableRooms($isLoggedIn, $roomsImages);  
            exit;  
        }
        
        $requestedCheckIn = UHTTP::post('data_check_in');
        $requestedCheckOut = UHTTP::post('data_check_out');
        $period = array($requestedCheckIn, $requestedCheckOut);
        USession::setSessionElement('period', $period);
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

        $roomsImages = array();
        $allImagesForAvailableRooms = array();
        foreach($availableRooms as $room){
            $images = FPersistentManager::getInstance()->getImagesByRoom($room->getId());
            $roomsImages[] = array($room, $images);
            $allImagesForAvailableRooms = array_merge($allImagesForAvailableRooms, $images);


        }
        
        USession::setSessionElement('searchedRoomImages', $allImagesForAvailableRooms);
        USession::setSessionElement('roomsImages', $roomsImages);
        $view->showAvailableRooms($isLoggedIn, $roomsImages);
    

        
    }

    public static function isRightLength($reqCheckIn, $reqCheckOut, $reqLength){
        $reqCheckIn = new DateTime($reqCheckIn);
        $reqCheckOut = new DateTime($reqCheckOut);
        $length = $reqCheckIn->diff($reqCheckOut)->days;
        
        if($length != $reqLength){
            
            return false;
        }else{
            return true;
        }
    }

    

    public static function isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut){
       
        $reqIn = new DateTime($requestedCheckIn);
        $reqOut = new DateTime($requestedCheckOut);
        $occIn = new DateTime($occupiedCheckIn);
        $occOut = new DateTime($occupiedCheckOut);

        $overlaps = ($reqOut >= $occIn && $reqIn <= $occOut);

        return !$overlaps;
    }

    public static function showDetailRoom($idRoom){
        $isLoggedIn = CUser::isLogged();
        
        $view = new VBooking();
        USession::getInstance()->setSessionElement('idRoom', $idRoom);
        $room = FPersistentManager::getInstance()->getObject('ERoom', $idRoom);
        $services = FPersistentManager::getInstance()->getAllExtraServices();
        $servObj = array();
        foreach($services as $queryRes){
            $servObj[] = new EExtraService($queryRes["idExtraService"], $queryRes["name"], $queryRes["description"], $queryRes["price"], $queryRes['pathImage']);
        }
        $allImages = USession::getInstance()->getSessionElement('searchedRoomImages');
        $images = array();
        foreach($allImages as $image){
            if($image->getIdRoom() == $idRoom){
                $images[] = $image;
            }
        }
        $view->showDetailBooking($isLoggedIn, $room, $images, $servObj);
        
    }

    public static function showDetailRoomWB($idRoom){
        $isLoggedIn = CUser::isLogged();
        if($isLoggedIn){
            $view = new VBooking();
            USession::getInstance()->setSessionElement('idRoom', $idRoom);
            $room = FPersistentManager::getInstance()->getObject('ERoom', $idRoom);
            $allImages = USession::getInstance()->getSessionElement('searchedRoomImages');
            $images = array();
            foreach($allImages as $image){
                if($image->getIdRoom() == $idRoom){
                    $images[] = $image;
                }
            }
            $view->showDetailBookingWB($isLoggedIn, $room, $images);
        }else{
            header('Location: /albergoPulito/public/Admin/showLoginForm ');
            exit;
        }
    }

    public static function showSummary($idRoom){
        $isLoggedIn = CUser::isLogged();
        if($isLoggedIn){
            $view = new VBooking();
            USession::getInstance();
            $idUser = USession::getSessionElement('idUser');
            $period = USession::getSessionElement('period');
            $room = FPersistentManager::getInstance()->getObject('ERoom',$idRoom);
            $idOffer = null;
            if(USession::isSetSessionElement('idOffer')){
                $idOffer = USession::getSessionElement('idOffer');
            }

            
            $selectedServices = UHTTP::post('selectedServices');
            $servObj = array();
            if(isset($selectedServices)){
                USession::setSessionElement('selectedServices', $selectedServices);
                foreach($selectedServices as $idServ){
                    $servObj[] = FPersistentManager::getInstance()->getObject('EExtraService', $idServ);
                }
            }
            
            $totalPrice = self::calculatePrice(new DateTime($period[0]), new DateTime($period[1]), $room->getPrice(), $servObj, $idOffer);
            USession::setSessionElement('totalPrice', $totalPrice);

            $specialOffer = FPersistentManager::getInstance()->getObject('ESpecialOffer', $idOffer);
            $booking = new EBooking(null, $idUser, new DateTime($period[0]), new DateTime( $period[1]), $idRoom, $totalPrice, null, $idOffer, null);
            
            $view->showSummary($isLoggedIn, $room, $booking, $servObj, $specialOffer);


            
        }
        else{
            header('Location: /albergoPulito/public/User/login');
            exit;
        }
    }

    public static function showPayment($idBooking, $totalPrice){
        $isLoggedIn = CUser::isLogged();
        if($isLoggedIn){
            $view = new VBooking();

            $view->showPayment($isLoggedIn, $idBooking, $totalPrice);
        }else{
            header('Location: /albergoPulito/public/Admin/manageRooms');
            exit;
        }
    }

    public static function makeBooking(){
        $isLoggedIn = CUser::isLogged();
        if($isLoggedIn){
            USession::getInstance();
            $idUser = USession::getSessionElement('idUser');
            $period = USession::getSessionElement('period');
            $idRoom = USession::getSessionElement('idRoom');
            $totalPrice = USession::getSessionElement('totalPrice');
            $services = USession::getSessionElement('selectedServices');
            $idOffer = null;
            if(USession::isSetSessionElement('idOffer')){
                $idOffer = USession::getSessionElement('idOffer');
            }
            $booking = new EBooking(null, $idUser, new DateTime($period[0]), new DateTime( $period[1]), $idRoom, $totalPrice, null, $idOffer, null);
            $result = FPersistentManager::getInstance()->saveObject($booking);  
            foreach($services as $serv){
                $result = FPersistentManager::getInstance()->setBookingsExtraServices($booking->getId(), $serv);
            }
            $digits = UHTTP::post('cardNumber');
            $digits = 'XXXX-XXXX-XXXX-' . substr($digits, -4);
            $payment = new EPayment(null, $booking->getId(), $booking->getTotalPrice(), null, $digits, UHTTP::post('cardName'));
            $result = FPersistentManager::getInstance()->saveObject($payment);
            header('Location: /albergoPulito/public/User/home');
            exit;
        }else{
            setcookie('redirectSelectedRoom', UHTTP::getReferer(), time() + 900,  "/"); //15 minuti
            header('Location: /albergoPulito/public/User/showFormLogin');
            exit();
        }
    }

    private static function calculatePrice(DateTime $checkIn, DateTime $checkOut, float $price, $extraService, ?int $idSpecialOffer = null){
        if(isset($extraService)){
            foreach($extraService as $serv){
                $price += $serv->getPrice();
            }
        }
        if($idSpecialOffer != null){
            $offer = FPersistentManager::getInstance()->getObject('ESpecialOffer',$idSpecialOffer);
            $totalPrice = $offer->getSpecialPrice();
            return $totalPrice;
        }

        $length = $checkIn->diff($checkOut);
        $length = $length->days;
        $totalPrice = $length * $price;
        return $totalPrice;
    }

    //PER LE PRENOTAZIONI CON LE SPECIAL OOFFER
    public static function getAvailableRoomsBySpecialOffer($idSpecialOffer) {
        $view = new VBooking();
        $isLoggedIn = CUser::isLogged();
        USession::getInstance();
        

        $requestedCheckIn = UHTTP::post('data_check_in');
        $requestedCheckOut = UHTTP::post('data_check_out');
        $period = array($requestedCheckIn, $requestedCheckOut);
        USession::setSessionElement('period', $period);

        $specialOffer = FPersistentManager::getInstance()->getObject('ESpecialOffer', $idSpecialOffer);
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
                    $requestedLength = (new DateTime($requestedCheckIn))->diff(new DateTime($requestedCheckOut))->days;
                    

                    $isLength = self::isRightLength($occupiedCheckIn, $occupiedCheckOut, $requestedLength);
                    if(!$isLength){
                        $isRoomCurrentlyAvailable = false;
                        break;
                    }                    
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
                $roomsImages = array();
        $allImagesForAvailableRooms = array();
        foreach($availableRooms as $room){
            $images = FPersistentManager::getInstance()->getImagesByRoom($room->getId());
            $roomsImages[] = array($room, $images);
            $allImagesForAvailableRooms = array_merge($allImagesForAvailableRooms, $images);
 

        }
        
        USession::setSessionElement('searchedRoomImages', $allImagesForAvailableRooms);
        USession::setSessionElement('roomsImages', $roomsImages);
        $view->showAvailableRooms($isLoggedIn, $roomsImages);
     
    }
}
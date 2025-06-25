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
        //echo 'GEEEEEEMMMMMMMMMMIIIIIIIIIINNNNNNNNNIIIIIIIIIII' . '<br>';

        $view = new VBooking();
        $isLoggedIn = CUser::isLogged();
        USession::getInstance();
        if(USession::isSetSessionElement('searchedRoomImages')){
            USession::unsetSessionElement('searchedRoomImages');
        }
        if(USession::isSetSessionElement('period')){
            USession::unsetSessionElement('period');
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
        
        $view->showAvailableRooms($isLoggedIn, $roomsImages);
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
        if($isLoggedIn){
            $view = new VBooking();
            USession::getInstance()->setSessionElement('idRoom', $idRoom);
            $room = FPersistentManager::getInstance()->getObject('ERoom', $idRoom);
            $services = FPersistentManager::getInstance()->getAllExtraServices();
            $servObj = array();
            foreach($services as $queryRes){
                $servObj[] = new EExtraService($queryRes["idExtraService"], $queryRes["name"], $queryRes["description"], $queryRes["price"]);
            }
            $allImages = USession::getInstance()->getSessionElement('searchedRoomImages');
            $images = array();
            foreach($allImages as $image){
                if($image->getIdRoom() == $idRoom){
                    $images[] = $image;
                }
            }
            $view->showDetailBooking($isLoggedIn, $room, $images, $servObj);
        }else{
            header('Location: /albergoPulito/public/Admin/manageRooms');
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

            
            $selectedServices = UHTTP::post('selectedServices');
            $servObj = array();
            if(isset($selectedServices)){
                USession::setSessionElement('selectedServices', $selectedServices);
                foreach($selectedServices as $idServ){
                    $servObj[] = FPersistentManager::getInstance()->getObject('EExtraService', $idServ);
                }
            }
            
            $totalPrice = self::calculatePrice(new DateTime($period[0]), new DateTime($period[1]), $room->getPrice(), $servObj, null);
            USession::setSessionElement('totalPrice', $totalPrice);
            $booking = new EBooking(null, $idUser, new DateTime($period[0]), new DateTime( $period[1]), $idRoom, $totalPrice, null, null, null);
            
            $view->showSummary($isLoggedIn, $room, $booking, $servObj);


            
        }
        else{
            header('Location: /albergoPulito/public/Admin/manageRooms');
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
            $booking = new EBooking(null, $idUser, new DateTime($period[0]), new DateTime( $period[1]), $idRoom, $totalPrice, null, null, null);
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

        $length = $checkIn->diff($checkOut);
        $length = $length->days;
        $totalPrice = $length * $price;
        return $totalPrice;
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
}
<?php

class CAdmin{

    public static function isAdminLogged(){
        $logged = false;

        if(USession::getInstance()->isSetSessionElement('admin')){
            $logged = true;
        }else{
            setcookie('redirectAdmin', UHTTP::getReferer(), time() + 900,  "/"); //15 minuti
            header('Location: /albergoPulito/public/User/showFormLogin');
            exit();
        }
        return $logged;
        
    }

    public static function dashboard(){
        $view = new VAdmin();
        $users = FPersistentManager::getInstance()->getAllUsers();
        $totUsers = count($users);
        $rooms = FPersistentManager::getInstance()->getAllRooms();
        $totRooms = count($rooms);
        $bookings = FPersistentManager::getInstance()->getAllBookings();
        $totBookings = count($bookings);
        $services = FPersistentManager::getInstance()->getAllExtraServices();
        $totServices = count($services);
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->dashboard($admin_logged_in, $totUsers, $totRooms, $totBookings, $totServices);
    }

//-----------------------USER--------------------------------------------------------------------------------
    public static function manageUsers(){
        $view = new VAdmin();
        $usersQuery = FPersistentManager::getInstance()->getAllUsers();
        $regUsersQuery = FPersistentManager::getInstance()->getAllRegisteredUsers();
        
        $users = array();
        $regUsers = array();
        foreach($usersQuery as $queryRes){
            $user = new EUser($queryRes["idUser"], $queryRes["firstName"], $queryRes["lastName"], new DateTime ($queryRes["birthDate"]), $queryRes["birthPlace"]);
            $users[] = $user;
        }

        foreach($regUsersQuery as $queryRes){
            $regUsers[] = new ERegisteredUser($queryRes["idRegisteredUser"], $queryRes["idUser"], $queryRes["email"], $queryRes["password"], $queryRes["firstName"], $queryRes["lastName"], new dateTime($queryRes["birthDate"]), $queryRes["birthPlace"], $queryRes["isBanned"]);
        }

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageUsers($admin_logged_in, $users, $regUsers);
    }

    public static function showInsertUser(){

        $view = new VAdmin();
        $pageTitle = 'Inserisci un utente';
        $errorMessage = '';
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertUser($admin_logged_in);
    }

    public static function insertUser(){
        $view = new VUser();
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $result = FPersistentManager::getInstance()->saveObject($user);
        if($result == false){
            echo 'UTENTE GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageUsers');
        }
    }

    public static function deleteUser($idUser){
        $result = FPersistentManager::getInstance()->deleteObject('EUser',$idUser);
        if($result){header('Location: /albergoPulito/public/Admin/manageUsers'); exit();}
        
    }

    public static function showInsertRegisteredUser(){

        $view = new VAdmin();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertRegisteredUser($admin_logged_in);
    }

    public static function insertRegisteredUser(){
        $view = new VUser();
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $idUser = FPersistentManager::getInstance()->saveObject($user);
        $regUser = new ERegisteredUser(null, $idUser, UHTTP::post("email"), UHTTP::post("password"), UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"), UHTTP::post("email"), false);
        $result = FPersistentManager::getInstance()->saveObject($regUser);
        if($result == false){
            echo 'UTENTE GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageUsers');
        }
    }

    public static function banRegisteredUser($idUser){
        $regUser = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idUser);
        $mod = array(['isBanned', true]);
        $result = FPersistentManager::getInstance()->updateObject($regUser, $mod);
        if($result){header('Location: /albergoPulito/public/Admin/manageUsers'); exit();}
        
    }

    public static function unBanRegisteredUser($idUser){
        $regUser = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idUser);
        $mod = array(['isBanned', false]);
        $result = FPersistentManager::getInstance()->updateObject($regUser, $mod);
        if($result){header('Location: /albergoPulito/public/Admin/manageUsers'); exit();}
        
    }

    public static function showUpdateUser($idUser){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idUserModified', $idUser);
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateUser($admin_logged_in, $user);
    }

    public static function updateUser(){
        
        $idUser = USession::getInstance()->getSessionElement('idUserModified');
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);
        $mod = array();
        if( UHTTP::post("firstName") != ''){$mod[] = ['firstName', UHTTP::post("firstName")];}
        if( UHTTP::post("lastName") != ''){$mod[] = ['lastName', UHTTP::post("lastName")];}
        if( UHTTP::post("birthDate") != null){$mod[] = ['birthDate', new DateTime(UHTTP::post("birthDate"))];}
        if( UHTTP::post("birthPlace") != ''){$mod[] = ['birthPlace', UHTTP::post("birthPlace")];}
        $result = FPersistentManager::getInstance()->updateObject($user, $mod);
        header('Location: /albergoPulito/public/Admin/manageUsers');
        exit;

    }

    public static function showUpdateRegisteredUser($idUser){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idRegisteredUserModified', $idUser);

        $user = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idUser);
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateRegisteredUser($admin_logged_in, $user);
    }

    public static function updateRegisteredUser(){
        
        $idRegisteredUser = USession::getInstance()->getSessionElement('idRegisteredUserModified');
        $registeredUser = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idRegisteredUser);
        $mod = array();
        if( UHTTP::post("firstName") != ''){$mod[] = ['firstName', UHTTP::post("firstName")];}
        if( UHTTP::post("lastName") != ''){$mod[] = ['lastName', UHTTP::post("lastName")];}
        if( UHTTP::post("birthDate") != null){$mod[] = ['birthDate', new DateTime(UHTTP::post("birthDate"))];}
        if( UHTTP::post("birthPlace") != ''){$mod[] = ['birthPlace', UHTTP::post("birthPlace")];}
        if( UHTTP::post("email") != ''){$mod[] = ['email', UHTTP::post("email")];}
        if( UHTTP::post("password") != ''){$mod[] = ['password', UHTTP::post("password")];}
        $result = FPersistentManager::getInstance()->updateObject($registeredUser, $mod);
        $idUser = $registeredUser->getIdUser();
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);
        $mod = array(['firstName', UHTTP::post("firstName")], ['lastName', UHTTP::post("lastName")], ['birthDate', new DateTime(UHTTP::post("birthDate"))], ['birthPlace', UHTTP::post("birthPlace")]);
        $result = FPersistentManager::getInstance()->updateObject($user, $mod);

        header('Location: /albergoPulito/public/Admin/manageUsers');
        exit;

    }

//----------------------------------------ROOM-----------------------------------------------------------------

    public static function manageRooms(){
        $view = new VAdmin();
        $rooms = FPersistentManager::getInstance()->getAllRooms();
        $roomsObj = array();
        foreach($rooms as $queryRes){
            $roomsObj[] = new ERoom($queryRes["idRoom"], $queryRes["name"], $queryRes["beds"], $queryRes["price"], $queryRes["type"], $queryRes["description"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageRooms($admin_logged_in, $roomsObj);
    }

    public static function showUpdateRoom($idRoom){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idRoomModified', $idRoom);

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateRoom($admin_logged_in);
    }

    public static function showInsertRoom(){

        $view = new VAdmin();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertRoom($admin_logged_in);
    }
    public static function insertRoom(){
        $room = new ERoom(null, UHTTP::post("name"), UHTTP::post("beds"), UHTTP::post("price"), UHTTP::post("type"), UHTTP::post("description"));
        $idRoom = FPersistentManager::getInstance()->saveObject($room);
        $images = UHTTP::files('room_images');
        $uploadDir = __DIR__ . '/../../public/assets/img/';
        if(isset($images)){
            foreach($images as $queryRes){
                $destPath = $uploadDir . $queryRes['name'];
                if(move_uploaded_file($queryRes['tmp_name'], $destPath)){
                
                    $uploadPath = 'albergoPulito/public/assets/img/' . $queryRes['name'];
                    $image = new EImage(null, $idRoom, $queryRes["name"], $uploadPath, $queryRes["type"]);

                    $result = FPersistentManager::getInstance()->saveObject($image);
                }else{
                    $view = new VError();
                    $isLoggedIn = self::isLogged();
                    $view->showError($isLoggedIn, "ERRORI NELLO SPOSTAMENTO", 'javascript:history.back()');
                }
            }


        }else{
            
            echo 'ERRORE NEL CARICAMENTO';
        }
        header('Location: /albergoPulito/public/Admin/manageRooms');
        exit;
 
        /*
        if($idRoom == false){
            echo 'ROOM GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageRooms');
        }*/
    }

    public static function updateRoom(){
        $view = new VAdmin();
        
        $idRoom = USession::getInstance()->getSessionElement('idRoomModified');
        $room = FPersistentManager::getInstance()->getObject('ERoom', $idRoom);
        $mod = array();
        if( UHTTP::post("name") != ''){$mod[] = ['name', UHTTP::post("name")];}
        if( UHTTP::post("beds") != null){$mod[] = ['beds', UHTTP::post("beds")];}
        if( UHTTP::post("type") != ''){$mod[] = ['type', UHTTP::post("type")];}
        if( UHTTP::post("price") != null){$mod[] = ['price', UHTTP::post("price")];}
        if( UHTTP::post("description") != ''){$mod[] = ['description', UHTTP::post("description")];}

        $result = FPersistentManager::getInstance()->updateObject($room, $mod);
        
        header('Location: /albergoPulito/public/Admin/manageRooms');
        exit;

    }

    public static function deleteRoom($idRoom){
        $result = FPersistentManager::getInstance()->deleteObject('ERoom', $idRoom);
        header('Location: /albergoPulito/public/Admin/manageRooms');
        exit;
    }

//--------------------------------------BOOKING-----------------------------------------------------------------

    public static function manageBookings(){
        $view = new VAdmin();
        $books = FPersistentManager::getInstance()->getAllBookings();
        $booksObj = array();
        foreach($books as $queryRes){
            $booksObj[] = new EBooking($queryRes["idBooking"], $queryRes["idRegisteredUser"], new DateTime($queryRes["checkInDate"]), new DateTime( $queryRes["checkOutDate"]), $queryRes["idRoom"], $queryRes["totalPrice"], new DateTime($queryRes["bookingDate"]), $queryRes["idSpecialOffer"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageBookings();
    }

    public static function showInsertBooking(){

        $view = new VAdmin();
        $users = FPersistentManager::getInstance()->getAllUsers();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertBooking($admin_logged_in);
    }

    public static function showBookingDetail($date){

        $view = new VAdmin();
        //$books = FPersistentManager::getInstance()->getAllBookings();
        $books = self::getBookingsByDate($date);
        $booksObj = array();
        foreach($books as $queryRes){
            $booksObj[] = new EBooking($queryRes["idBooking"], $queryRes["idRegisteredUser"], new DateTime($queryRes["checkInDate"]), new DateTime( $queryRes["checkOutDate"]), $queryRes["idRoom"], $queryRes["totalPrice"], new DateTime($queryRes["bookingDate"]), $queryRes["idSpecialOffer"]);
        }
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showBookingDetail($booksObj, $date);
    }

    public static function deleteBooking($idBooking){
        $result = FPersistentManager::getInstance()->deleteObject('EBooking',$idBooking);
        if($result){header('Location: /albergoPulito/public/Admin/manageBookings'); exit();}
        
    }

    public static function getBookingsByDate($date){
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

//----------------------------------------------EXTRASERVICE--------------------------------------------------------

    public static function manageExtraServices(){
        $view = new VAdmin();
        $services = FPersistentManager::getInstance()->getAllExtraServices();
        $servicesObj = array();
        foreach($services as $queryRes){
            $servicesObj[] = new EExtraService($queryRes["idExtraService"], $queryRes["name"], $queryRes["description"], $queryRes["price"], $queryRes['pathImage']);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageExtraServices($admin_logged_in, $servicesObj);
    }

    public static function showInsertService(){
        $admin_logged_in = self::isAdminLogged();
        if($admin_logged_in){
            $view = new VAdmin();
            $view->showInsertService($admin_logged_in);

        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function insertService(){
        $extraService = new EExtraService(null, UHTTP::post('name'), UHTTP::post('description'), UHTTP::post('price'), UHTTP::file('pathImage'));
        $result = FPersistentManager::getInstance()->saveObject($extraService);
        if($result == false){
            echo 'UTENTE GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageExtraService');
        }
    }

    public static function showUpdateService($idService){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idServiceModified', $idService);

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateService($admin_logged_in);
    }

    public static function updateService(){
        $view = new VAdmin();
        
        $idService = USession::getInstance()->getSessionElement('idServiceModified');
        $service = FPersistentManager::getInstance()->getObject('EExtraService', $idService);
        $mod = array();
        if( UHTTP::post("name") != ''){$mod[] = ['name', UHTTP::post("name")];}
        if( UHTTP::post("description") != ''){$mod[] = ['description', UHTTP::post("description")];}
        if( UHTTP::post("price") != null){$mod[] = ['price', UHTTP::post("price")];}
        if( UHTTP::file('pathImage') != null){$mod[] = ['pathImage', UHTTP::file('pathImage')];}
        $result = FPersistentManager::getInstance()->updateObject($service, $mod);
        
        
        header('Location: /albergoPulito/public/Admin/manageExtraService');
        exit;

    }

    public static function deleteService($idService){
        $result = FPersistentManager::getInstance()->deleteObject('EExtraService', $idService);
        header('Location: /albergoPulito/public/Admin/manageExtraService');
        exit;
    }

//--------------------------------------------------SPECIALOFFER----------------------------------------------------------

    
    public static function manageSpecialOffer(){
        $view = new VAdmin();
        $offers = FPersistentManager::getInstance()->getAllSpecialOffer();
        $offersObj = array();
        foreach($offers as $queryRes){
            $offersObj[] = new ESpecialOffer($queryRes["idSpecialOffer"], $queryRes["title"], $queryRes["description"], $queryRes["beds"], $queryRes["length"], $queryRes["specialPrice"], $queryRes['pathImage']);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageOffers($admin_logged_in, $offersObj);
    }

    public static function showInsertOffer(){
        $view = new VAdmin();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertOffer($admin_logged_in);
    }

    public static function insertOffer(){
        
        $image = UHTTP::file('room_image');
        $uploadDir = __DIR__ . '/../../public/assets/img/';
        if(isset($image) && $image['error'] === UPLOAD_ERR_OK){
            echo 'qui' . $image['name'];
            $destPath = $uploadDir . $image['name'];
            if(move_uploaded_file($image['tmp_name'], $destPath)){
                $uploadPath = '/albergoPulito/public/assets/img/' . $image['name'];
            }else{
                echo 'ERRORI NELLO SPOSTAMENTO';
            }
        }else{
            echo 'ERRORE NEL CARICAMENTO';
        }
        $offer = new ESpecialOffer(null, UHTTP::post('title'), UHTTP::post('description'), UHTTP::post('beds'), UHTTP::post('length'), UHTTP::post('specialPrice'), $uploadPath);
        $result = FPersistentManager::getInstance()->saveObject($offer);
        
        if($result == false){
            echo 'OFFERTA GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageSpecialOffer');
        }
    }  

//---------------------------STATISTICS------------------------------------ù

    public static function showStatistics(){

		$admin_logged_in = self::isAdminLogged();

		$rooms = FPersistentManager::getInstance()->getAllRooms();
		$bookings = FPersistentManager::getInstance()->getAllBookings();
		$extraServices = FPersistentManager::getInstance()->getAllExtraServices();
        
		$reviews = FPersistentManager::getInstance()->getAllReview();
        echo count($reviews);
  
        $bookedServices = FPersistentManager::getInstance()->getAllBookingsExtraServices();
        
		$stats = UStatistiche::calculateStats($rooms, $bookings, $extraServices, $bookedServices, $reviews);

		$view = new VStatistics();
		$view->showDashboard($stats);
	}

    public static function showStat(){
        $admin_logged_in = self::isAdminLogged();

		$rooms = FPersistentManager::getInstance()->getAllRooms();
		$bookings = FPersistentManager::getInstance()->getAllBookings();
		$extraServices = FPersistentManager::getInstance()->getAllExtraServices();
        
		$reviews = FPersistentManager::getInstance()->getAllReview();
        echo count($reviews);
  
        
		$stats = UStatistiche::calculateStats($rooms, $bookings, $extraServices, $bookedServices, $reviews);

		$view = new VStatistics();
		$view->showDashboard($stats);
    }

}
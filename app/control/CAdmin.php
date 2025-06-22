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
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->dashboard($admin_logged_in, $totUsers);
    }

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
            $regUsers[] = new ERegisteredUser($queryRes["idRegisteredUser"], $queryRes["idUser"], $queryRes["email"], $queryRes["password"], $queryRes["firstName"], $queryRes["lastName"], new dateTime($queryRes["birthDate"]), $queryRes["birthPlace"]);
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

    public static function banRegisteredUser($idUser){
        $regUser = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idUser);
        $mod = array(['isBanned', true]);
        $result = FPersistentManager::getInstance()->updateObject($regUser, $mod);
        if($result){header('Location: /albergoPulito/public/Admin/manageUsers'); exit();}
        
    }

    public static function showUpdateUser($idUser){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idUserModified', $idUser);

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateUser($admin_logged_in);
    }

    public static function updateUser(){
        
        $idUser = USession::getInstance()->getSessionElement('idUserModified');
        echo $idUser;
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);
        $mod = array(['firstName', UHTTP::post("firstName")], ['lastName', UHTTP::post("lastName")], ['birthDate', new DateTime(UHTTP::post("birthDate"))], ['birthPlace', UHTTP::post("birthPlace")]);
        $result = FPersistentManager::getInstance()->updateObject($user, $mod);
        header('Location: /albergoPulito/public/Admin/manageUsers');
        exit;

    }

    public static function manageRooms(){
        $view = new VAdmin();
        $rooms = FPersistentManager::getInstance()->getAllRooms();
        $roomsObj = array();
        foreach($rooms as $queryRes){
            $roomsObj[] = new ERoom($queryRes["idRoom"], $queryRes["name"], $queryRes["beds"], $queryRes["price"], $queryRes["type"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageRooms($admin_logged_in, $roomsObj);
    }

    public static function showUpdateRoom($idRoom){
        $view = new VAdmin();
        
        USession::getInstance()->setSessionElement('idRoomModified', $idRoomModified);

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showUpdateRoom($admin_logged_in);
    }

    public static function showInsertRoom(){

        $view = new VAdmin();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertRoom($admin_logged_in);
    }
    public static function insertRoom(){
        $view = new VUser();
        $room = new ERoom(null, UHTTP::post("name"), UHTTP::post("beds"), UHTTP::post("price"), UHTTP::post("type"));
        $idRoom = FPersistentManager::getInstance()->saveObject($room);
        $images = UHTTP::files('room_images');
        foreach($images as $queryRes){
            $image = new EImage(null, $idRoom, $queryRes["name"], $queryRes["tmp_name"], $queryRes["type"]);

            $result = FPersistentManager::getInstance()->saveObject($image);
        }
        if($result == false){
            echo 'ROOM GIA ESISTENTE';
        }else{
            header('Location: /albergoPulito/public/Admin/manageRooms');
        }
    }

    public static function updateRoom(){
        $view = new VAdmin();
        
        $idRoom = USession::getInstance()->getSessionElement('idRoomModified');
        $room = FPersistentManager::getInstance()->getObject('ERoom', $idRoom);
        $mod = array(['name', UHTTP::post("name")], ['beds', UHTTP::post("beds")], ['price', UHTTP::post("price")], ['type', UHTTP::post("type")]);
        $result = FPersistentManager::getInstance()->updateObject($room, $mod);
        
        $result = FPersistentManager::getInstance()->updateObject();
        header('Location: /albergoPulito/public/Admin/manageRooms');
        exit;

    }

    public static function manageBookings(){
        $view = new VAdmin();
        $books = FPersistentManager::getInstance()->getAllBookings();
        $booksObj = array();
        foreach($books as $queryRes){
            $booksObj[] = new EBooking($queryRes["idBooking"], $queryRes["idRegisteredUser"], new DateTime($queryRes["checkInDate"]), new DateTime( $queryRes["checkOutDate"]), $queryRes["idRoom"], $queryRes["totalPrice"], new DateTime($queryRes["bookingDate"]), $queryRes["idSpecialOffer"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageBookings($admin_logged_in, $booksObj);
    }

    public static function showInsertBooking(){

        $view = new VAdmin();
        $users = FPersistentManager::getInstance()->getAllUsers();
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->showInsertBooking($admin_logged_in);
    }

    public static function deleteBooking($idBooking){
        $result = FPersistentManager::getInstance()->deleteObject('EBooking',$idBooking);
        if($result){header('Location: /albergoPulito/public/Admin/manageBookings'); exit();}
        
    }

    public static function manageExtraServices(){
        $view = new VAdmin();
        $services = FPersistentManager::getInstance()->getAllExtraServices();
        $servicesObj = array();
        foreach($services as $queryRes){
            $servicesObj[] = new EExtraService($queryRes["idExtraService"], $queryRes["name"], $queryRes["description"], $queryRes["price"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageExtraServices($admin_logged_in, $servicesObj);
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
        $mod = array(['name', UHTTP::post("name")], ['description', UHTTP::post("description")], ['price', UHTTP::post("price")]);
        $result = FPersistentManager::getInstance()->updateObject($service, $mod);
        
        
        header('Location: /albergoPulito/public/Admin/manageExtraService');
        exit;

    }

    public static function manageSpecialOffer(){
        $view = new VAdmin();
        $offers = FPersistentManager::getInstance()->getAllSpecialOffer();
        $offersObj = array();
        foreach($offers as $queryRes){
            $offersObj[] = new ESpecialOffer($queryRes["idSpecialOffer"], $queryRes["title"], $queryRes["description"], $queryRes["beds"], $queryRes["length"], $queryRes["specialPrice"]);
        }
       
        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageOffers($admin_logged_in, $offersObj);
    }
}
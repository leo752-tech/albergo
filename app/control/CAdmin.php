<?php

class CAdmin{

    public static function isAdminLogged(){
        $logged = false;

        if(USession::getInstance()->isSetSessionElement('admin')){
            $logged = true;
        }else{
            setcookie('redirectAdmin', UHTTP::getReferer(), time() + 900,  "/"); //15 minuti
            header('Location: /~momok/User/showFormLogin');
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
        $users = array();
        foreach($usersQuery as $queryRes){
            $user = new EUser($queryRes["idUser"], $queryRes["firstName"], $queryRes["lastName"], new DateTime ($queryRes["birthDate"]), $queryRes["birthPlace"]);
            $users[] = $user;
        }

        $admin_logged_in = CAdmin::isAdminLogged();
        $view->manageUsers($admin_logged_in, $users);
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
            header('Location: /~momok/Admin/manageUsers');
        }
    }

    public static function deleteUser($idUser){
        $result = FPersistentManager::getInstance()->deleteObject('EUser',$idUser);
        if($result){header('Location: /~momok/Admin/manageUsers'); exit();}
        
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
        header('Location: /~momok/Admin/manageUsers');
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

    public static function updateRoom($idRoom){
        $view = new VAdmin();
        
        $idRoom = USession::getInstance()->getSessionElement('idUserModified');
        echo $idUser;
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);
        $mod = array(['firstName', UHTTP::post("firstName")], ['lastName', UHTTP::post("lastName")], ['birthDate', new DateTime(UHTTP::post("birthDate"))], ['birthPlace', UHTTP::post("birthPlace")]);
        $result = FPersistentManager::getInstance()->updateObject($user, $mod);
        header('Location: /~momok/Admin/manageUsers');
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

    public static function deleteBooking($idBooking){
        $result = FPersistentManager::getInstance()->deleteObject('EBooking',$idBooking);
        if($result){header('Location: /~momok/Admin/manageBookings'); exit();}
        
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
}
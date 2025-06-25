<?php

class CUser{

    public function __construct(){}

    public static function isLogged()
    {
        $logged = false;

        if(UCookie::isSet("PHPSESSID")){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::getInstance()->isSetSessionElement("idUser")){
            $logged = true;
        }
        
        return $logged;
    }

    //TESTATO
    public static function registration(){
        $view = new VUser();
        if(!FPersistentManager::userExists(UHTTP::post("email"))){

            $user= new EUser(null,UHTTP::post('firstName'), UHTTP::post('lastName'), new DateTime(UHTTP::post('birthDate')), UHTTP::post('birthPlace'));
            $id=FPersistentManager::getInstance()->saveObject($user);
            $registeredUser = new ERegisteredUser(null,$id,UHTTP::post('email'), UHTTP::post('password'),UHTTP::post('firstName'), UHTTP::post('lastName'),new dateTime(UHTTP::post('birthDate')),UHTTP::post('birthPlace'));
            $result = FPersistentManager::getInstance()->saveObject($registeredUser);
            //echo "OPERATION SUCCESSFUL";

            header('Location: /albergoPulito/public/User/showFormsLogin');
            return $result;

        }else{
            //visualizzazione schermata di errore
            echo "USER ALREADY EXISTS";
            return false;
        }
    }

    public static function showFormsRegistration(){
        $view = new VUser();
        $isLoggedIn = self::isLogged();
        $view->showFormsRegistration($isLoggedIn);
    }

    
    
    //TESTATO
    public static function login(){
        $email = UHTTP::post("email");
        $password = UHTTP::post("password");
        if($email == EMAIL_ADMIN){
            if(password_verify($password, PASSWORD_ADMIN)){
                USession::getInstance();
                USession::setSessionElement("admin", EMAIL_ADMIN);
                header("Location: /albergoPulito/public/Admin/dashboard");
                exit;
                
            }else{echo "WRONG PASSWORD";
                return false;}
        }elseif(FPersistentManager::getInstance()->userExists($email)){
            $registeredUser = FPersistentManager::getInstance()->retrieveUser($email);
            if(password_verify($password, $registeredUser->getPassword())){
                USession::getInstance();
                USession::setSessionElement("idUser", $registeredUser->getIdRegisteredUser());
                if(UCOOKIE::isSet('redirectSelectedRoom')){
                    $redirect = UCOOKIE::getElement('redirectSelectedRoom');
                    setcookie('redirectSelectedRoom', '', time() - 3600, '/');
                    header('Location: ' . $redirect);
                    exit(); 
                }else{
                    header("Location: /albergoPulito/public/User/home");
                    exit();
                }

            }else{echo "WRONG PASSWORD";
                return false;}
        }else{
            echo "USER NON-EXISTENT";
            return false;
        }
    }

    public static function logout(){
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        header('Location: /albergoPulito/public/User/home');
    }

    //DA VEDERE
    public static function home(){
        $view = new VUser();
        $isLoggedIn = self::isLogged();
        $view->home($isLoggedIn);  
        
    }
    public static function showLoginForm(){
        $view = new VUser();
        $view->showFormsLogin(); 
    }

    
    public static function showAccountDetails(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $idUser = USession::getInstance()->getSessionElement('idUser');
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser',$idUser);
            $birthDate = $user->getBirthDate();
            $birthDate = $birthDate->format('d-m-Y');
            $view->showAccountDetail($isLoggedIn, $user, $birthDate);
        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showUpdateAccount(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $idUser = USession::getInstance()->getSessionElement('idUser');
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser',$idUser);
            $view->showUpdateAccount($isLoggedIn, $user);

        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showUpdatePassword(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $user = USession::getInstance()->getSessionElement('idUser');
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser',$idUser);
            $view->showUpdatePassword($isLoggedIn, $user);

        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function updateAccount(){
        
        USession::getInstance();
        $idUser = USession::getSessionElement('idUser');
        $registeredUser = FPersistentManager::getInstance()->getObject('ERegisteredUser',$idUser);
        $mod = array();
        if( UHTTP::post("firstName") != ''){$mod[] = ['firstName', UHTTP::post("firstName")];}
        if( UHTTP::post("lastName") != ''){$mod[] = ['lastName', UHTTP::post("lastName")];}
        if( UHTTP::post("birthDate") != null){$mod[] = ['birthDate', new DateTime(UHTTP::post("birthDate"))];}
        if( UHTTP::post("birthPlace") != ''){$mod[] = ['birthPlace', UHTTP::post("birthPlace")];}
        if( UHTTP::post("email") != ''){$mod[] = ['email', UHTTP::post("email")];}
        $result = FPersistentManager::getInstance()->updateObject($registeredUser, $mod);
        $registeredUser = FPersistentManager::getInstance()->getObject('ERegisteredUser', $registeredUser->getIdRegisteredUser());
        $idUser = $registeredUser->getIdUser();
        $user = FPersistentManager::getInstance()->getObject('EUser', $idUser);
        $mod = array(['firstName', UHTTP::post("firstName")], ['lastName', UHTTP::post("lastName")], ['birthDate', new DateTime(UHTTP::post("birthDate"))], ['birthPlace', UHTTP::post("birthPlace")]);
        $result = FPersistentManager::getInstance()->updateObject($user, $mod);
        USession::getInstance()->unsetSessionElement('user');
        USession::getInstance()->setSessionElement('user', serialize($registeredUser));

        header('Location: /albergoPulito/public/User/showAccountDetails');
        exit;

    }

    public static function updatePassword(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $registeredUser = USession::getInstance()->getSessionElement('user');
            $registeredUser = unserialize($registeredUser);
        
            if(password_verify(UHTTP::post('currentPassword'), $registeredUser->getPassword())){
                if(UHTTP::post('newPassword')==UHTTP::post('confirmNewPassword')){
                    $registeredUser->setPassword(UHTTP::post('newPassword'));
                    $mod = array(['password', $registeredUser->getPassword()]);
                    $result = FPersistentManager::getInstance()->updateObject($registeredUser, $mod);
                    USession::getInstance()->unsetSessionElement('user');
                    USession::getInstance()->setSessionElement('user', serialize($registeredUser));
                    header('Location: /albergoPulito/public/User/showAccountDetails');
                }else{
                    echo 'PAASWORD NON COMBACIANO';
                }
            }else{
                echo 'PASSWORD ERRATA';
            }
        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showMyBookings(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $idUser = USession::getInstance()->getSessionElement('idUser');
            $bookings = FPersistentManager::getInstance()->getBookingsByUser($idUser);
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser', $idUser);
            $view->showMyBookings($isLoggedIn, $user, $bookings);

        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showMyReview(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $idUser = USession::getInstance()->getSessionElement('idUser');
            $reviews = FPersistentManager::getInstance()->getReviewsByUser($idUser);
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser',$idUser);
            $view->showMyReviews($isLoggedIn, $reviews);

        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showSetReview(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $view = new VUser();
            $view->showSetReview($isLoggedIn);
        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    private static function hasBooking($idUser){
        $result = FPersistentManager::getInstance()->getBookingsByUser($idUser);
        if(count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    public static function setReview(){
        $isLoggedIn = self::isLogged();
        if($isLoggedIn){
            $idUser = USession::getInstance()->getSessionElement('idUser');
            if(self::hasBooking($idUser)){
                $view = new VUser();
                $review = new EReview(null, UHTTP::post('title'), UHTTP::post('rating'), UHTTP::post('description'), new DateTime(), $idUser);
                $result = FPersistentManager::getInstance()->saveObject($review);
                header('Location: /albergoPulito/public/User/showAccountDetails');
                exit;
            }else{
                echo 'NESSUNA PRENOTAZIONE EFFETTUATA, NON PUOI LASCIARE UNA RECENSIONE';
            }
        }else{
            header('Location: /albergoPulito/public/');
            exit;
        }
    }

    public static function showAllReviews(){
        $isLoggedIn = self::isLogged();
        $view = new VUser();
        $reviewUser = array();
        $reviews = FPersistentManager::getInstance()->getAllReview();
        $revObj = array();
        foreach($reviews as $queryRes){
            $revObj[] = new EReview($queryRes["idReview"], $queryRes["title"], $queryRes["rating"], $queryRes["description"], new DateTime($queryRes["date"]), $queryRes["idRegisteredUser"]);
        }
        foreach($revObj as $rev){
            $user = FPersistentManager::getInstance()->getObject('ERegisteredUser',$rev->getIdRegisteredUser());
            $fullName = $user->getFirstName() . ' ' . $user->getLastName();
            $reviewUser[] = [$rev, $fullName];
        }
        $view->showAllReviews($isLoggedIn, $reviewUser);

    }

    
	
}

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
        if(USession::isSetSessionElement("user")){
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

            header('Location: /~momok/dummy/User/showFormsLogin');
            return $result;

        }else{
            //visualizzazione schermata di errore
            echo "USER ALREADY EXISTS";
            return false;
        }
    }

    public static function showFormsLogin(){
        $view = new VUser();
        $view->showFormsLogin();
    }
    
    //TESTATO
    public static function login(){
        $email = UHTTP::post("email");
        $password = UHTTP::post("password");
        if($email == EMAIL_ADMIN){
            if(password_verify($password, PASSWORD_ADMIN)){
                /*USession::getInstance();
                USession::setSessionElement("admin", EMAIL_ADMIN);
                echo "ADMINNNNNNN";
                header("Location: /~momok/dummy/User/home");
                echo "ADMINNNNNNN";
                exit();
                return true;*/
                echo '----------------------------------------------------------';
            }else{echo "WRONG PASSWORD";
                return false;}
        }elseif(FPersistentManager::getInstance()->userExists($email)){
            $registeredUser = FPersistentManager::getInstance()->retrieveUser($email);
            if(password_verify($password, $registeredUser->getPassword())){
                USession::getInstance();
                USession::setSessionElement("user", serialize($registeredUser));
                
                header("Location: /~momok/dummy/User/home");
                //echo "LOGIN SUCCESSFUL  USER LOGGED WITH ID: " . USession::getSessionElement("idUser");
                exit();
                return true;
            }else{echo "WRONG PASSWORD";
                return false;}
        }else{
            echo "USER NON-EXISTENT";
            return false;
        }
    }

    //DA VEDERE
    public static function home(){
        $view = new VUser();
        if(self::isLogged()){
            $user = unserialize(USession::getSessionElement('user'));
            $view->home($user);
        }else{
            $view->home();
        }
        
    }
    public static function showLoginForm(){
        $view = new VUser();
        $view->showFormsLogin(); 
    }

    
    public static function getAllUser(){
        $view = new VUser();
        $users = FPersistentManager::getInstance()->getAll("EUser");
        $view->showUsers($users);
    }

    public static function insertUser(){
        $view = new VUser();
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $result = FPersistentManager::getiInstance()->saveObject($user);
        $view->insertUser($user);
    }
	
}

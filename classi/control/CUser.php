<?php
include_once('C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\view\VUserschizz.php');
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
        if(!$logged){
            header("Location: /Agora/User/login");
            exit;
        }
        return true;
    }

    //TESTATO
    public static function registration(){
        //creazione oggetto view
        if(!FPersistentManager::userExists(UHTTP::post("email"))){
            $user= new EUser(null,UHTTP::post('firstName'), UHTTP::post('lastName'), new DateTime(UHTTP::post('birthDate')), UHTTP::post('birthPlace'));
            $id=FPersistentManager::getInstance()->saveObject($user);
            $registeredUser = new ERegisteredUser(null,$id,UHTTP::post('email'), UHTTP::post('password'),UHTTP::post('firstName'), UHTTP::post('lastName'),new dateTime(UHTTP::post('birthDate')),UHTTP::post('birthPlace'));
            $result = FPersistentManager::getInstance()->saveObject($registeredUser);
            echo "OPERATION SUCCESSFUL";

            //visualizzazione schermata di login
            return $result;

        }else{
            //visualizzazione schermata di errore
            echo "USER ALREADY EXISTS";
            return false;
        }
    }
    
    //TESTATO
    public static function login(){
        //oggetto view 
        $email = UHTTP::post("email");
        $password = UHTTP::post("password");

        if(FPersistentManager::getInstance()->userExists($email)){
            $registeredUser = FPersistentManager::getInstance()->retrieveUser($email);
            if(password_verify($password, $registeredUser->getPassword())){
                USession::getInstance();
                USession::setSessionElement("idUser", $registeredUser->getIdRegisteredUser());
                //header("Location: home page path");
                echo "LOGIN SUCCESSFUL  USER LOGGED WITH ID: " . USession::getSessionElement("idUser");
                exit();
                return true;
            }else{echo "WRONG PASSWORD";
                return false;}
        }else{
            echo "USER NON-EXISTENT";
            return false;
        }
    }

    public static function home(){
        $user = new VUserschizz();
        $user->home();
    }
    
    public static function getAllUser(){
        $users = FPersistentManager::getInstance()->getAllUsers();
        //visualizzazione
    }

    public static function insertUser(){
        //oggetto view
        $user = new EUser(null, UHTTP::post("firstName"), UHTTP::post("lastName"), new DateTime(UHTTP::post("birthDate")), UHTTP::post("birthPlace"));
        $result = FPersistentManager::getiInstance()->saveObject($user);
    }
	
}

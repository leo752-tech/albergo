<?php

class CUtente{

    public function __construct(){}

    function registration(){
        //creazione oggetto view
        if(!FPersistentManager::esisteUtente(UHTTP::post("mail"), UHTTP::post("password"))){
            $utente = new EUtenteRegistrato(UHTTP::post('mail'), UHTTP::post('password'),UHTTP::post('nome'), UHTTP::post('cognome'),UHTTP::post('dataN'),UHTTP::post('comuneN'));
            $result = FPersistentManager::salvaOggetto($utente);
            echo "OPERAZIONE RIUSCITA";

            //visualizzazione schermata di login
            return $result;

        }else{
            //visualizzazione schermata di errore
            echo "UTENTE GIA ESISTENTE";
            return false;
        }
    }

    public static function login(){
        //oggetto view 
        $mail = UHTTP::post("mail");
        $password = UHTTP::post("password");

        if(FPersistentManager::esisteUtente($mail)){
            $utente = FPersistentManager::getInstance()->recuperaUtente($mail);
            if(password_verify($password, $utente->getPassword())){
                USession::getInstance();
                USession::setOggettoSessione("utente", $utente->getIdUtente());
                header("Location: persorso della pagina di home");
                exit();
                echo "LOGIN RIUSCITO";
                return true;
            }else{echo "PASSWORD ERRATA";
                return false;}
        }else{
            echo "USER INESISTENTE";
            return false;
        }
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

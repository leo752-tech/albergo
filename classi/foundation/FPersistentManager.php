<?php

class FPersistentManager{
	
	//SINGLETON PATTERN
    private static $instance;

    private function __construct(){}
 
    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    //-------------------GENERALI-------------------
 
    public static function getOggetto($classe, $id){
        $classe = "F" . substr($classe, 1);
        $metodo = "getOggetto";
        $result = call_user_func([$classe, $metodo], $id);
        return $result;
    }

    public static function salvaOggetto($oggetto){
        $classe = "F" . substr(get_class($oggetto), 1);
        $metodo = "salvaOggetto";
        $result = call_user_func([$classe, $metodo], $oggetto);
        return $result;
    }

    public static function cancellaOggetto($classe, $id){
        $classe = "F" . substr($classe, 1);
        $metodo = "cancellaOggetto";
        $result = call_user_func([$classe, $metodo], $id);
        return $result;

    }
//---------------------UTENTE----------------------------------
    public static function esisteUtente($mail){
        if(FUtenteRegistrato::esisteUtente($mail)){
            return true;
        }else{
            return false;
        }
    }

    public static function recuperaUtente($mail){
        $utente = FUtenteRegistrato::getUtenteMail($mail);
        return $utente;
    }

/*
    public static function verificaOccupazioneCamera($oggettoPeriodo, $idCamera){
        foreach ($occupazioni as $p) {
            $occupato = FPeriodo::recuperaPeriodo($p);
            if($p->)
        }
    }*/


    public static function getAllCaamere(){
        $camere = FCamera::getAllCamere();
        return $camere;
    }
}
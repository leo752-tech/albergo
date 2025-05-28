<?php

class FUtenteRegistrato{

    private static $key = "idUtenteRegistrato";

    private static $class = "FUtenteRegistrato";
   
    private static $table = "utenteregistrato";
   
    private static $values = "(NULL,:idUtente,:mail,:password,:nome,:cognome,:dataNascita,:comuneNascita)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$utente) { 
        $stmt->bindValue(":mail", $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(":password", $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(":nome", $utente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":cognome", $utente->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(":dataNascita", $utente->getDataNascita(), PDO::PARAM_STR);
        $stmt->bindValue(":comuneNascita", $utente->getComuneNascita(), PDO::PARAM_STR);     
    }

    public static function getKey(){
        return self::$key;
    }
    
    public static function getClass(){
        return self::$class;
    }

    public static function getTable(){
        return self::$table;
    }

    public static function getValues(){
        return self::$values;
    }

    //crea un oggetto ECamera
    public static function creaOggetto($queryRes){
        $utente = new EUtenteRegistrato(null, $queryRes["idUtente"], $queryRes["mail"], $queryRes["password"], $queryRes["nome"], $queryRes["cognome"], $queryRes["dataNascita"], $queryRes["comuneNascita"]);
        if (isset($queryRes["idUtenteRegistrato"])) { 
            $utente->setId($queryRes["idUtenteRegistrato"]);
            $utente->setHashPassword($queryRes["password"]);
        }
        return $utente;
    }

    //recupera un oggetto EUtente tramite il suo id
    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $utente = self::creaOggetto($result);
            return $utente;
        }else{
            return null;
        }
    }

    //recupera un oggetto EUtente tramite il suo id
    public static function getUtenteMail($mail){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, "mail", $mail);
        if($result != false && $result != null){
            $utente = self::creaOggetto($result);
            return $utente;
        }else{
            return null;
        }
    }

    public static function esisteUtente($mail){
        $result1 = FDataMapper::getInstance()->esiste(self::$table, "mail", $mail);
        if($result1 != false){
            return true;
        }else{
            return false;
        }
    }

    //salva l'oggetto utente se non esiste, altrimenti fa un aggiornamento
    public static function salvaOggetto($oggetto , $campi = null){
        if($campi === null){
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            FDataMapper::getInstance()->getDb()->commit();
            if($id !== null){
                $oggetto->setId($id);
                return true;
            }else{
                return false;
            }
            
            }
        else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getId());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            }
        }
    }

    //cancella un oggetto dal db
    public static function cancellaUtente($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->esiste(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Utente non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}

?>
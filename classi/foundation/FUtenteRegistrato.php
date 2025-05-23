<?php

class FUtenteRegistrato{

    private static $key = "idUtente";

    private static $class = "FUtenteRegistrato";
   
    private static $table = "utenteregistrato";
   
    private static $values = "(NULL,:mail,:password,:nome,:cognome,:dataN,:comuneN)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$utente) { 
        $stmt->bindValue(":mail", $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(":password", $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(":nome", $utente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":cognome", $utente->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(":dataN", $utente->getDataN(), PDO::PARAM_STR);
        $stmt->bindValue(":comuneN", $utente->getComuneN(), PDO::PARAM_STR);     
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
    public static function creaUtente($queryRes){
        $utente = new EUtenteRegistrato($queryRes["mail"], $queryRes["password"], $queryRes["nome"], $queryRes["cognome"], $queryRes["dataN"], $queryRes["comuneN"]);
        if (isset($queryRes["idUtente"])) { 
            $utente->setIdUtente($queryRes["idUtente"]);
        }
        return $utente;
    }

    //recupera un oggetto EUtente tramite il suo id
    public static function getUtente($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $utente = self::creaUtente($result);
            return $utente;
        }else{
            return null;
        }
    }

    //salva l'oggetto utente se non esiste, altrimenti fa un aggiornamento
    public static function salvaUtente($oggetto , $campi = null){
        if($campi === null){
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($id !== null){
                $oggetto->setIdUtente($id);
                return $id;
            }else{
                return false;
            }
            
            }
        else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdUtente());
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

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
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
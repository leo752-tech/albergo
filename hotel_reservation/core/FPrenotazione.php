<?php

class FPrenotazione{

    private static $key = "idPrenotazione";

    private static $class = "FPrenotazione";
   
    private static $table = "prenotazione";
   
    private static $values = "(NULL,:idUtente,:idUtenti,:idPeriodo,:idCamera,:idServizioExtra,NULL,:cancellazione)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$prenotazione) {
        $stmt->bindValue(":idUtente", $prenotazione->getIdUtente(), PDO::PARAM_INT);
        // Serializzazione dell'array 'utenti' in JSON per salvarlo in un campo TEXT/JSON nel DB
        $utentiJson = json_encode($prenotazione->getIdUtenti());
        //Controlla se la codifica JSON è fallita (es. array contiene risorse o oggetti ricorsivi)
        if ($utentiJson === false) {
            // Gestisci l'errore, magari logga o lancia un'eccezione
            throw new \RuntimeException("Errore nella codifica JSON dell'array 'utenti'.");
        }
        $stmt->bindValue(":idUtenti", $utentiJson, PDO::PARAM_STR);
        $stmt->bindValue(":idPeriodo", $prenotazione->getIdPeriodo(), PDO::PARAM_INT);
        $stmt->bindValue(":idCamera", $prenotazione->getIdCamera(), PDO::PARAM_INT);
        $stmt->bindValue(":idServizioExtra", $prenotazione->getIdServizioExtra(), PDO::PARAM_INT);   
       
        $stmt->bindValue(":cancellazione", $prenotazione->getCancellazione(), PDO::PARAM_BOOL); 
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

    public static function creaPrenotazione($queryRes){
        $prenotazione = new EPrenotazione($queryRes["idUtente"], $queryRes["idUtenti"], $queryRes["idPeriodo"], $queryRes["idCamera"], $queryRes["idServizioExtra"], $queryRes["prezzo"], $queryRes["cancellazione"]);
        if (isset($queryRes["idPrenotazione"])) { 
            $prenotazione->setIdPrenotazione($queryRes["idPrenotazione"]);
        }
        return $prenotazione;
    }

    public static function getPrenotazione($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $prenotazione = self::creaPrenotazione($result);
            return $prenotazione;
        }else{
            return null;
        }
    }

    public static function salvaPrenotazione($oggetto , $campi = null){
        if($campi === null){
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($id !== null){
                $oggetto->setIdPrenotazione($id);
                return $id;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdPrenotazione());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            }finally{
                FDataMapper::getInstance()->closeConnection();
            }  
        }
    }

    public static function cancellaPrenotazione($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Prenotazione non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }

    }
}

?>

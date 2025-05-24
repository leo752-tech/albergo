<?php

class FPrenotazione{

    private static $key = "idPrenotazione";

    private static $class = "FPrenotazione";
   
    private static $table = "prenotazione";
   
    private static $values = "(NULL,:idUtente,:utenti,:idPeriodo,:idCamera,:idServizio,:prezzo,:cancellazione)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$prenotazione) {
        $stmt->bindValue("idUtente", $prenotazione->getUtente()->getId(), PDO::PARAM_INT);
        // Serializzazione dell'array 'utenti' in JSON per salvarlo in un campo TEXT/JSON nel DB
        $utenti = json_encode($prenotazione->getUtenti());
        //Controlla se la codifica JSON è fallita (es. array contiene risorse o oggetti ricorsivi)
        if ($utenti === false) {
            // Gestisce l'errore, magari logga o lancia un'eccezione
            throw new \RuntimeException("Errore nella codifica JSON dell'array 'utenti'.");
        }
        $stmt->bindValue(":utenti", $utenti, PDO::PARAM_STR);
        $stmt->bindValue("idPeriodo", $prenotazione->getPeriodo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue("idCamera", $prenotazione->getCamera()->getId(), PDO::PARAM_INT);
        $stmt->bindValue("idServizio", $prenotazione->getServizio()->getId(), PDO::PARAM_STR);    
        $stmt->bindValue("prezzo", $prenotazione->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue("cancellazione", $prenotazione->getCancellazione(), PDO::PARAM_BOOL); 
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

    //crea un oggetto EPrenotazione
    public static function creaPrenotazione($queryRes){
        $prenotazione = new EPrenotazione($queryRes["idUtente"], $queryRes["utenti"], $queryRes["idPeriodo"], $queryRes["idCamera"], $queryRes["idServizio"], $queryRes["prezzo"], $queryRes["cancellazione"]);
        if (isset($queryRes["idPrenotazione"])) { 
            $prenotazione->setIdPrenotazione($queryRes["idPrenotazione"]);
        }
        return $prenotazione;
    }

    //recupera un oggetto EPrenotazione tramite il suo id
    public static function getPrenotazione($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $prenotazione = self::creaPrenotazione($result);
            return $prenotazione;
        }else{
            return null;
        }
    }

//salva l'oggetto prenotazione se non esiste, altrimenti fa un aggiornamento
    public static function salvaPrenotazione($oggetto , $campi = null){
        if($campi === null){
            $prenotazione = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($prenotazione !== null){
                return $prenotazione;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdCamera());
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

<?php

class FPrenotazione{

    private static $key = "idPrenotazione";

    private static $class = "FPrenotazione";
   
    private static $table = "prenotazioni";
   
    private static $values = "(NULL,:idUtente,:inizio,:fine,:idCamera,:prezzo,:dataPrenotazione,:cancellazione)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$prenotazione) {
        $stmt->bindValue(":idUtente", $prenotazione->getIdUtente(), PDO::PARAM_INT);
        $stmt->bindValue(":inizio", $prenotazione->getInizio(), PDO::PARAM_STR);
        $stmt->bindValue(":fine", $prenotazione->getFine(), PDO::PARAM_STR);
        $stmt->bindValue(":idCamera", $prenotazione->getIdCamera(), PDO::PARAM_INT);
        $stmt->bindValue(":prezzo", $prenotazione->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue(":dataPrenotazione", $prenotazione->getDataPrenotazione(), PDO::PARAM_STR);
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

    public static function creaOggetto($queryRes){
        $prenotazione = new EPrenotazione($queryRes["idUtente"], $queryRes["inizio"], $queryRes["fine"], $queryRes["idCamera"], $queryRes["prezzo"], $queryRes["dataPrenotazione"], $queryRes["cancellazione"]);
        if (isset($queryRes["idPrenotazione"])) { 
            $prenotazione->setId($queryRes["idPrenotazione"]);
        }
        return $prenotazione;
    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $prenotazione = self::creaOggetto($result);
            return $prenotazione;
        }else{
            return null;
        }
    }

    public static function salvaOggetto($oggetto , $campi = null){
        if($campi === null){
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            FDataMapper::getInstance()->commit();
            if($id !== null){
                $oggetto->setId($id);
                return true;
            }else{
                return false;
            }
        }else{
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
            }finally{
                FDataMapper::getInstance()->closeConnection();
            }  
        }
    }

    public static function cancellaPrenotazione($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->esiste(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->cancellaOggetto(self::$table, self::$key, $id);
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
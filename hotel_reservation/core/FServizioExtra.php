<?php

class FServizioExtra{

    private static $key = "idServizioExtra";

    private static $class = "FServizioExtra";
   
    private static $table = "servizioextra";
   
    private static $values = "(NULL,:nome,:descrizione,:prezzo,:idPrenotazione)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$servizioExtra) {
        $stmt->bindValue("nome", $servizioExtra->getNome(), PDO::PARAM_STR);
        $stmt->bindValue("descrizione", $servizioExtra->getDescrizione(), PDO::PARAM_STR);    
        $stmt->bindValue("prezzo", $servizioExtra->getPrezzo(), PDO::PARAM_STR);
        $stmt->bindValue("idPrenotazione", $servizioExtra->getIdPrenotazione(), PDO::PARAM_INT);
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

    public static function creaServizioExtra($queryRes){
        $servizioExtra = new EServizioExtra($queryRes["nome"], $queryRes["descrizione"], $queryRes["prezzo"], $queryRes["idPrenotazione"]);
        if (isset($queryRes["idServizioExtra"])) { 
            $servizioExtra->setIdServizioExtra($queryRes["idServizioExtra"]);
        }
        return $servizioExtra;
    }

    public static function getServizioExtra($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $servizioExtra = self::creaServizioExtra($result);
            return $servizioExtra;
        }else{
            return null;
        }
    }

    public static function salvaServizioExtra($oggetto , $campi = null){
        if($campi === null){
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($id !== null){
                $oggetto->setIdServizioExtra($id);
                return $id;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdServizioExtra());
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

    public static function cancellaServizioExtra($id){
       try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "ServizioExtra non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}

?>

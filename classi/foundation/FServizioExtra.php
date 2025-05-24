<?php

class FServizioExtra{

    private static $key = "idServizioExtra";

    private static $class = "FServizioExtra";
   
    private static $table = "servizioExtra";
   
    private static $values = "(:idServizioExtra,:nome,:descrizione,:prezzo,:idPrenotazione)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$servizioExtra) {
        
        $stmt->bindValue("idServizioExtra", $servizioExtra->getIdServizioExtra(), PDO::PARAM_INT);
        $stmt->bindValue("nome", $servizioExtra->getNome(), PDO::PARAM_STR);
        $stmt->bindValue("descrizione", $servizioExtra->getDescrizione(), PDO::PARAM_STR);    
        $stmt->bindValue("prezzo", $servizioExtra->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue("idPrenotazione", $servizioExtra->getPrenotazione()->getId(), PDO::PARAM_INT);
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
        $servizioExtra = new EServizioExtra($queryRes["idServizioExtra"], $queryRes["nome"], $queryRes["descrizione"], $queryRes["prezzo"], $queryRes["idPrenotazione"]);
        return $servizioExtra;
    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $servizioExtra = self::creaOggetto($result);
            return $servizioExtra;
        }else{
            return null;
        }
    }

    public static function salvaOggetto($oggetto , $campi = null){
        if($fieldArray === null){
            $servizioExtra = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($servizioExtra !== null){
                return $servizioExtra;
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

    public static function cancellaServizioExtra($oggetto){
        FDataMapper::getInstance()->getDb()->beginTransaction();
        if(FDataMapper::esiste())//DA FINIRE
        FDataMapper::cancellaServizioExtra(self::$table, self::$key, $oggetto->getId());

    }
}

?>
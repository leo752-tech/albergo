<?php

class FServizioExtra{

    private static $key = "idServizioExtra";

    private static $class = "FServizioExtra";
   
    private static $table = "servizi_extra";
   
    private static $values = "(NULL,:nome,:descrizione,:prezzo)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$servizioExtra) {
        $stmt->bindValue("nome", $servizioExtra->getNome(), PDO::PARAM_STR);
        $stmt->bindValue("descrizione", $servizioExtra->getDescrizione(), PDO::PARAM_STR);    
        $stmt->bindValue("prezzo", $servizioExtra->getPrezzo(), PDO::PARAM_STR);
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
        $servizioExtra = new EServizioExtra($queryRes["nome"], $queryRes["descrizione"], $queryRes["prezzo"]);
        if (isset($queryRes["idServizioExtra"])) { 
            $servizioExtra->setId($queryRes["idServizioExtra"]);
        }
        return $servizioExtra;
    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $servizioExtra = self::creaOggetto($result);
            return $servizioExtra;
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
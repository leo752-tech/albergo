<?php

class FRecensione{

    private static $key = "idRecensione";

    private static $class = "FRecensione";
   
    private static $table = "recensione";
   
    private static $values = "(:idRecensione,:titolo,:valutazione,:descrizione,:data)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$recensione) {
        $stmt->bindValue(":idRecensione", $recensione->getIdRecensione(), PDO::PARAM_INT); 
        $stmt->bindValue(":titolo", $recensione->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue("valutazione", $recensione->getValutazione(), PDO::PARAM_INT);
        $stmt->bindValue("descrizione", $recensione->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue("data", $recensione->getData()->format('Y-m-d H:i:s'), PDO::PARAM_STR);    
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
        $recensione = new ERecensione($queryRes["idRecensione"], $queryRes["titolo"], $queryRes["valutazione"], $queryRes["descrizione"], $queryRes["data"]);
        return $recensione;
    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $recensione = self::creaOggetto($result);
            return $recensione;
        }else{
            return null;
        }
    }

    public static function salvaOggetto($oggetto , $campi = null){
        if($fieldArray === null){
            $recensione = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($recensione !== null){
                return $recensione;
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

    public static function cancellaRecensione($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Recensione non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}

?>
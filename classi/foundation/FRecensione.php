<?php

class FRecensione{

    private static $key = "idRecensione";

    private static $class = "FRecensione";
   
    private static $table = "recensione";
   
    private static $values = "(NULL,:titolo,:valutazione,:descrizione,:data)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$recensione) {
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

    //crea un oggetto ERecensione
    public static function creaRecensione($queryRes){
        $recensione = new ERecensione($queryRes["titolo"], $queryRes["valutazione"], $queryRes["descrizione"], $queryRes["data"]);
        if (isset($queryRes["idRecensione"])) { 
            $recensione->setIdRecensione($queryRes["idRecensione"]);
        }
        return $recensione;
    }

    //recupera un oggetto ERecensione tramite il suo id
    public static function getRecensione($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $recensione = self::creaRecensione($result);
            return $recensione;
        }else{
            return null;
        }
    }

//salva l'oggetto recensione se non esiste, altrimenti fa un aggiornamento
    public static function salvaRecensione($oggetto , $campi = null){
        if($campi === null){
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
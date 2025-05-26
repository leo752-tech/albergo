<?php

class FPeriodo{

    private static $key = "idPeriodo";

    private static $class = "FPeriodo";
   
    private static $table = "periodo";
   
    private static $values = "(NULL,:inizio,:fine,:lunghezza,:tipo)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$periodo) {
        $stmt->bindValue(":inizio", $periodo->getInizio()->format('d-m-Y'), PDO::PARAM_STR);
        $stmt->bindValue("fine", $periodo->getFine()->format('d-m-Y'), PDO::PARAM_STR);
        $stmt->bindValue("lunghezza", $periodo->getLunghezza(), PDO::PARAM_INT);
        $stmt->bindValue("tipo", $periodo->getTipo(), PDO::PARAM_STR);    
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
        $periodo = new EPeriodo(new DateTime($queryRes["inizio"]), new DateTime($queryRes["fine"]), $queryRes["lunghezza"], $queryRes["tipo"]);
        if (isset($queryRes["idPeriodo"])) { 
            $utente->setIdUtente($queryRes["idPeriodo"]);
        }
        return $periodo;
    }

    public static function getPeriodo($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $periodo = self::creaOggetto($result);
            return $periodo;
        }else{
            return null;
        }
    }

    public static function salvaPeriodo($oggetto , $campi = null){
        if($campi === null){
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);

            if($id !== null){
                $oggetto->setIdPeriodo($id);
                return $id;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdPeriodo());
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

    public static function cancellaPeriodo($id){
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

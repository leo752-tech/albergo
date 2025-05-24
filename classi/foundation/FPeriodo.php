<?php

class FPeriodo{

    private static $key = "idPeriodo";

    private static $class = "FPeriodo";
   
    private static $table = "periodo";
   
    private static $values = "(:idPeriodo,:inizio,:fine,:lunghezza,:tipo)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$periodo) {
        $stmt->bindValue(":idPeriodo", $periodo->getIdPeriodo(), PDO::PARAM_INT); 
        $stmt->bindValue(":inizio", $periodo->getInizio()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $stmt->bindValue("fine", $periodo->getFine()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
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
        $periodo = new EPeriodo($queryRes["idPeriodo"], $queryRes["inizio"], $queryRes["fine"], $queryRes["lunghezza"], $queryRes["tipo"]);
        return $periodo;
    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $periodo = self::creaOggetto($result);
            return $periodo;
        }else{
            return null;
        }
    }

    public static function salvaOggetto($oggetto , $campi = null){
        if($fieldArray === null){
            $periodo = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($periodo !== null){
                return $periodo;
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

    public static function cancellaPeriodo($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Periodo non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}
?>
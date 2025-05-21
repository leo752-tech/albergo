<?php

class FCamera{


    private static $class = "FCamera";
   
    private static $table = "camera";
   
    private static $values = ""
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi del Luogo da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ELuogo $place luogo in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ELuogo $place) {
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':province', $place->getProvince(), PDO::PARAM_STR); 
        $stmt->bindValue(':name', $place->getName(), PDO::PARAM_STR); 
    }

    /**
    * questo metodo restituisce il nome della classe per la costruzione delle Query
    * @return string $class nome della classe
    */
    public static function getClass(){
        return self::$class;
    }

    /**
    * questo metodo restituisce il nome della tabella per la costruzione delle Query
    * @return string $table nome della tabella
    */
    public static function getTable(){
        return self::$table;
    }

    /**
    * questo metodo restituisce l'insieme dei valori per la costruzione delle Query
    * @return string $values nomi delle colonne della tabella
    */
    public static function getValues(){
        return self::$values;
    }
}

?>
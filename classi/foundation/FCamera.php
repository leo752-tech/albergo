<?php

class FCamera{

    private static $key = "idCamera";

    private static $class = "FCamera";
   
    private static $table = "camera";
   
    private static $values = "(:idCamera,:nome,:posti,:prezzo,:tipo)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$camera) {
        $stmt->bindValue(":idCamera", $camera->getIdCamera(), PDO::PARAM_INT); 
        $stmt->bindValue(":nome", $camera->getNome(), PDO::PARAM_INT);
        $stmt->bindValue("posti", $camera->getPosti(), PDO::PARAM_INT);
        $stmt->bindValue("prezzo", $camera->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue("tipo", $camera->getTipo(), PDO::PARAM_STR);     
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

    }

    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if(count($result) > 0){
            $camera = self::creaOggetto($result);
            return $camera;
        }else{
            return null;
        }
    }
}

?>

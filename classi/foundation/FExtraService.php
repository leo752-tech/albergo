<?php

class FExtraService {

    private static $key = "idExtraService";

    private static $class = "FExtraService";
    
    private static $table = "extraservice";
    
    private static $values = "(NULL,:name,:description,:price)";
    
    public function __construct(){}

    public static function bind($stmt, $extraService) {
        $stmt->bindValue("name", $extraService->getName(), PDO::PARAM_STR);
        $stmt->bindValue("description", $extraService->getDescription(), PDO::PARAM_STR);    
        $stmt->bindValue("price", $extraService->getPrice(), PDO::PARAM_STR);
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

    public static function createObject($queryRes){
        $extraService = new EExtraService($queryRes["idExtraService"], $queryRes["name"], $queryRes["description"], $queryRes["price"]);
        return $extraService;
    }

    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $extraService = self::createObject($result);
            return $extraService;
        } else {
            return null;
        }
    }

    public static function saveObject($object, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $object);
            FDataMapper::getInstance()->getDb()->commit();
            if($id !== null){
                $object->setId($id);
                return true;
            } else {
                return false;
            }
        } else {
            try {
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($fields as $f){
                    FDataMapper::getInstance()->updateObject(self::$table, $f[0], $f[1], self::$key, $object->getId());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            }
        }
    }

    public static function deleteObject($id){
       try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::exists(self::$table, self::$key, $id)){
                FDataMapper::deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "Extra Service does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getAll(){
        try{
            $result = FDataMapper::getInstance()->selectAll(self::$table);
            return $result;

        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getExtraServiceByUsed($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            $extraServices = FDataMapper::getInstance()->select("booking_extraservice", "idExtraService", $id);
            FDataMapper::getInstance()->getDb()->commit();
            if(count($extraServices)>0){return $extraServices;}
            else{return $extraServices = array();}
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>
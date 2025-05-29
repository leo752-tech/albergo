<?php

class FExtraService {

    private static $key = "extraServiceId";

    private static $class = "FExtraService";
    
    private static $table = "extra_services";
    
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
        $extraService = new EExtraService($queryRes["name"], $queryRes["description"], $queryRes["price"]);
        if (isset($queryRes["extraServiceId"])) {
            $extraService->setId($queryRes["extraServiceId"]);
        }
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
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $object);
            FDataMapper::getInstance()->commit();
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

    public static function deleteExtraService($id){
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
}

?>
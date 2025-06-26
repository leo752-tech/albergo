<?php

class FSpecialOffer{

    private static $key = "idSpecialOffer";

    private static $class = "FSpecialOffer";
    
    private static $table = "specialOffer";
    
    
    public function __construct(){}

    private static $values = "(NULL, :title, :description, :beds, :length, :specialPrice, :pathImage)";

    public static function bind($stmt, $specialOffer) {
        $stmt->bindValue(":title", $specialOffer->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(":description", $specialOffer->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(":beds", $specialOffer->getBeds(), PDO::PARAM_INT);
        $stmt->bindValue(":length", $specialOffer->getLength(), PDO::PARAM_INT);
        $stmt->bindValue(":specialPrice", $specialOffer->getSpecialPrice(), PDO::PARAM_STR);
        $stmt->bindValue(":pathImage", $specialOffer->getPathImage(), PDO::PARAM_STR);
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
        $specialOffer = new ESpecialOffer($queryRes["idSpecialOffer"], $queryRes["title"], $queryRes["description"], $queryRes["beds"], $queryRes["length"], $queryRes["SpecialPrice"], $queryRes["pathImage"]);
        return $specialOffer;
    }

    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if(count($result) > 0){
            $specialOffer = self::createObject($result);
            return $specialOffer;
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
                $object->setIdSpecialOffer($id);
                return $id;
            } else {
                return false;
            }
        } else {
            try {
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($fields as $f){
                    $fieldName = $f[0];   
                    $fieldValue = $f[1];  

                    if ($fieldValue instanceof DateTime) {
                        $fieldValue = $fieldValue->format("Y-m-d"); 
                    }
                    FDataMapper::getInstance()->updateObject(self::$table, $fieldName, $fieldValue, self::$key, $object->getId());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            } finally {
                FDataMapper::getInstance()->closeConnection();
            }
        }
    }

    public static function deleteObject($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "Special offer does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getAll(){
        $specialOffers = FDataMapper::getInstance()->selectAll(self::$table);
        return $specialOffers;
    }



}


?>
<?php

class FImage{

    private static $key = "idImage";

    private static $class = "FImage";
    
    private static $table = "image";
    
    private static $values = "(NULL,:idRoom,:name,:imageData,:mimeType)";
    
    public function __construct(){}

    public static function bind($stmt,$image) {
        $stmt->bindValue(":idRoom", $image->getIdRoom(), PDO::PARAM_INT);
        $stmt->bindValue(":name", $image->getName(), PDO::PARAM_STR);
        $stmt->bindValue(":imageData", $image->getImageData(), PDO::PARAM_LOB);
        $stmt->bindValue(":mimeType", $image->getMimeType(), PDO::PARAM_STR);
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

    // creates an ERoom object
    public static function createObject($queryRes){
        $image = new EImage($queryRes["idImage"], $queryRes["idRooma"], $queryRes["name"], $queryRes["imageData"], $queryRes["mimeType"]);
        return $image;
    }

    // retrieves an ERoom object by its id
    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $image = self::createObject($result);
            return $image;
        } else {
            return null;
        }
    }

    // saves the room object if it doesn't exist, otherwise updates it
    public static function saveObject($image, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $image);
            FDataMapper::getInstance()->getDb()->commit();
            if($id !== null){
                $image->setId($id);
                return $id;
            } else {
                return false;
            }
        } else {
            try {
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($fields as $f){
                    FDataMapper::getInstance()->updateObject(self::$table, $f[0], $f[1], self::$key, $image->getId());
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

    // deletes an object from the db
    public static function deleteObject($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "Room does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getAll(){
        $rooms = FDataMapper::getInstance()->selectAll(self::$table);
        return $image;
    }

    public static function getImageByRoom($room){
        $images = self::getAll();
        $imagesRoom = array();
        foreach ($images as $queryRes){
            if($room == $queryRes["idRoom"]){
                $image = self::createObject($queryRes);
                $imagesRoom[] = $image;
            }
        }
        return $imagesRoom;
    }
}

?>
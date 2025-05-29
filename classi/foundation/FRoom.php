<?php

class FRoom{

    private static $key = "idRoom";

    private static $class = "FRoom";
    
    private static $table = "room";
    
    private static $values = "(NULL,:name,:beds,:price,:type)";
    
    public function __construct(){}

    public static function bind($stmt,$room) {
        $stmt->bindValue(":name", $room->getName(), PDO::PARAM_INT);
        $stmt->bindValue(":beds", $room->getBeds(), PDO::PARAM_INT);
        $stmt->bindValue(":price", $room->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(":type", $room->getType(), PDO::PARAM_STR);
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
        $room = new ERoom($queryRes["name"], $queryRes["beds"], $queryRes["price"], $queryRes["type"]);
        if (isset($queryRes["idRoom"])) {
            $room->setId($queryRes["idRoom"]);
        }
        return $room;
    }

    // retrieves an ERoom object by its id
    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $room = self::createObject($result);
            return $room;
        } else {
            return null;
        }
    }

    // saves the room object if it doesn't exist, otherwise updates it
    public static function saveObject($room, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $room);
            FDataMapper::getInstance()->commit();
            if($id !== null){
                $room->setId($id);
                return true;
            } else {
                return false;
            }
        } else {
            try {
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($fields as $f){
                    FDataMapper::getInstance()->updateObject(self::$table, $f[0], $f[1], self::$key, $room->getId());
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
    public static function deleteRoom($id){
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

    public static function getAllRooms(){
        $rooms = FDataMapper::getInstance()->selectAll(self::$table);
        return $rooms;
    }

    public static function getRoomsByBeds($beds){
        $rooms = self::getAllRooms();
        $availableRooms = array();
        foreach ($rooms as $queryRes){
            if($queryRes["beds"]<=$beds){
                $room = new ERoom($queryRes["name"], $queryRes["beds"], $queryRes["price"], $queryRes["type"]);
                $room->setId($queryRes["id"]);
                $availableRooms[] = $room;
            }
        }
        return $availableRooms;
    }
}

?>
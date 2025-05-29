<?php

class FUser {

    private static $key = "userId";

    private static $class = "FUser";
    
    private static $table = "user";
    
    private static $values = "(NULL,:firstName,:lastName,:birthDate,:birthCity)";
    
    public function __construct(){}

    public static function bind($stmt, $user) {
        $stmt->bindValue(":firstName", $user->getFirstName(), PDO::PARAM_STR);
        $stmt->bindValue(":lastName", $user->getLastName(), PDO::PARAM_STR);
        $stmt->bindValue(":birthDate", $user->getBirthDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":birthCity", $user->getBirthCity(), PDO::PARAM_STR);      
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

    // Creates an EUser object
    public static function createObject($queryRes){
        $user = new EUser(null, $queryRes["firstName"], $queryRes["lastName"], $queryRes["birthDate"], $queryRes["birthCity"]);
        if (isset($queryRes["userId"])) {
            $user->setId($queryRes["userId"]);
        }
        return $user;
    }

    // Retrieves an EUser object by its ID
    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $user = self::createObject($result);
            return $user;
        } else {
            return null;
        }
    }

    // Saves the user object if it doesn't exist, otherwise updates it
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
                foreach($fields as $c){
                    FDataMapper::getInstance()->updateObject(self::$table, $c[0], $c[1], self::$key, $object->getId());
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

    // Deletes an object from the database
    public static function deleteUser($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "User does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>
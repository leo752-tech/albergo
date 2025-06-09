<?php

class FRegisteredUser {

    private static $key = "idRegisteredUser";

    private static $class = "FRegisteredUser";
    
    private static $table = "registereduser";
    
    private static $values = "(NULL,:userId,:email,:password,:firstName,:lastName,:birthDate,:birthPlace)";
    
    public function __construct(){}

    public static function bind($stmt, $user) {
        $stmt->bindValue(":userId", $user->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(":firstName", $user->getFirstName(), PDO::PARAM_STR);
        $stmt->bindValue(":lastName", $user->getLastName(), PDO::PARAM_STR);
        $stmt->bindValue(":birthDate", $user->getBirthDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":birthPlace", $user->getBirthPlace(), PDO::PARAM_STR);      
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

    // Creates an ERegisteredUser object
    public static function createObject($queryRes){
        $user = new ERegisteredUser($queryRes["idRegisteredUser"], $queryRes["idUser"], $queryRes["email"], $queryRes["password"], $queryRes["firstName"], $queryRes["lastName"], new dateTime($queryRes["birthDate"]), $queryRes["birthPlace"]);
        if (isset($queryRes["password"])) {
            $user->setHashedPassword($queryRes["password"]);
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

    // Retrieves an EUser object by its email
    public static function getUserByEmail($email){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, "email", $email);
        if($result != false && $result != null){
            $user = self::createObject($result);
            return $user;
        } else {
            return null;
        }
    }

    public static function userExists($email){
        $result1 = FDataMapper::getInstance()->exists(self::$table, "email", $email);
        if($result1 != false){
            return true;
        } else {
            return false;
        }
    }

    // Saves the user object if it doesn't exist, otherwise updates it
    public static function saveObject($object, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $object);
            FDataMapper::getInstance()->getDb()->commit();
            if($id !== null){
                $object->setIdRegisteredUser($id);
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
                    FDataMapper::getInstance()->updateObject(self::$table, $fieldName, $fieldValue, self::$key, $object->getIdRegisteredUser());
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
    public static function deleteObject($id){
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

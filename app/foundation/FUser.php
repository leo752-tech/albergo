<?php

class FUser {

    private static $key = "idUser";

    private static $class = "FUser";
    
    private static $table = "user";
    
    private static $values = "(NULL,:firstName,:lastName,:birthDate,:birthPlace)";
    
    public function __construct(){}

    public static function bind($stmt, $user) {
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

    // Creates an EUser object
    public static function createObject($queryRes){
        $user = new EUser($queryRes["idUser"], $queryRes["firstName"], $queryRes["lastName"], new DateTime ($queryRes["birthDate"]), $queryRes["birthPlace"]);
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
                $object->setIdUser($id);
                return $id;
            } else {
                return false;
            }
        } else {
    try {
        FDataMapper::getInstance()->getDb()->beginTransaction();
        foreach($fields as $c){ 
            $fieldName = $c[0];   
            $fieldValue = $c[1];
            
            // Questo blocco converte l'oggetto DateTime in una stringa se è un oggetto DateTime
            if ($fieldValue instanceof DateTime) {
                echo 'QUI';
                $fieldValue = $fieldValue->format("Y-m-d"); 
            }

            FDataMapper::getInstance()->updateObject(self::$table, $fieldName, $fieldValue, self::$key, $object->getIdUser());
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

    public static function getAll(){
        $users = FDataMapper::getInstance()->selectAll(self::$table);
        return $users;
    }

    
}

?>
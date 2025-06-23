<?php

class FReview {

    private static $key = "idReview";

    private static $class = "FReview";
    
    private static $table = "review";
    
    private static $values = "(NULL,:title,:rating,:description,:date,:idUser)";
    
    public function __construct(){}

    public static function bind($stmt, $review) {
        $stmt->bindValue(":title", $review->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(":rating", $review->getRating(), PDO::PARAM_INT);
        $stmt->bindValue(":description", $review->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(":date", $review->getDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":idUser", $review->getIdRegisteredUser(), PDO::PARAM_INT);      
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

    // Creates an EReview object
    public static function createReview($queryRes){
        $review = new EReview($queryRes["idReview"], $queryRes["title"], $queryRes["rating"], $queryRes["description"], new dateTime($queryRes["date"]), $queryRes["idRegisteredUser"]);
        return $review;
    }

    // Retrieves an EReview object by its ID
    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $review = self::createReview($result);
            return $review;
        } else {
            return null;
        }
    }

    // Saves the review object if it doesn't exist, otherwise updates it
    public static function saveObject($object, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $object);
            FDataMapper::getInstance()->getDb()->commit();
            if($id !== null){
                $object->setId($id);
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
            }
        }
    }

    // Deletes an object from the database
    public static function deleteObject($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::exists(self::$table, self::$key, $id)){
                FDataMapper::deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "Review does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getAll(){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();
            $reviews = FDataMapper::getInstance()->selectAll(self::$table);
            FDataMapper::getInstance()->getDb()->commit();
            return $reviews;

        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }



}

?>
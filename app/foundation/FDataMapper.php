<?php

class FDataMapper {

    private static $instance;

    private static $db;
    private $name = "hotel_db";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    /*private static $db;
    private $name = "my_provahotelprova";
    private $host = "localhost";
    private $user = "provahotelprova";
    private $password = "";*/

    // SINGLETON PATTERN
    private function __construct(){
        try {
            self::$db = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->password);
        } catch(PDOException $e){
            echo "ERROR". $e->getMessage();
            die;
        }
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    //------------------------------------------------------------------------------------------------------
    
    public static function closeConnection(){
        static::$instance = null;
    }

    public static function getDb(){
        return self::$db;
    }

    public static function exists($table, $id, $value){
        try {
            $query = "SELECT COUNT(*) FROM " . $table . " WHERE " . $id . " = '" . $value . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $numRows = $stmt->fetchColumn();
            return $numRows > 0;
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function retrieveObject($table, $field ,$value){
        try {
            if(self::exists($table, $field, $value)){
                $query = "SELECT * FROM " . $table . " WHERE " . $field . " = '" . $value . "';";
                $stmt = self::$db->prepare($query);
                $stmt->execute();
                $object = $stmt->fetch(PDO::FETCH_ASSOC);           
                return $object;
            } else {
                echo "OBJECT DOES NOT EXIST";
                return null;
            }
            
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    public static function updateObject($table, $field, $fieldValue, $condition, $conditionValue){
        
        try {
            $query = "UPDATE " . $table . " SET ". $field. " = '" . $fieldValue . "' WHERE " . $condition . " = '" . $conditionValue . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        } catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function saveObject($class, $object)
    {
        try {
            $query = "INSERT INTO " . $class::getTable() . " VALUES " . $class::getValues();
            $stmt = self::$db->prepare($query);
            $class::bind($stmt, $object);
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        } catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    public static function saveBookingsExtraServices($idBooking, $idExtraService)
    {
        try {
            $query = "INSERT INTO " . "booking_extraservice" . " VALUES " . "(NULL,:idBooking,:idExtraService)";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue("idBooking", $idBooking, PDO::PARAM_INT);
            $stmt->bindValue("idExtraService", $idExtraService, PDO::PARAM_INT);    
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        } catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }
    

    public static function deleteObject($table, $field, $id){
        try {
            $query = "DELETE FROM " . $table . " WHERE " . $field . " = '".$id."';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        } catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function selectAll($table) {
        try {
            $query = "SELECT * FROM " . $table . ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if($num > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            } else {
                return array();
            }
        } catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }

    public static function select($table, $field, $id) {
        try {
            $query = "SELECT * FROM " . $table . " WHERE " . $field . " ='" . $id . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if($num > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            } else {
                return array();
            }
        } catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }

    public static function selectBetween($table, $field, $id1, $id2) {
        try {
            $query = "SELECT * FROM " . $table . " WHERE " . $field . " BETWEEN " . $id1 . " AND " . $id2 . ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if($num > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            } else {
                return array();
            }
        } catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }


}

?>
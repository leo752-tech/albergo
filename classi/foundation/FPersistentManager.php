<?php

class FPersistentManager {
    
    //SINGLETON PATTERN
    private static $instance;

    private function __construct(){}
    
    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    //-------------------GENERAL METHODS-------------------
    
    public static function getObject($class, $id){
        $class = "F" . substr($class, 1);
        $method = "getObject";
        $result = call_user_func([$class, $method], $id);
        return $result;
    }

    public static function saveObject($object){
        $class = "F" . substr(get_class($object), 1);
        $method = "saveObject";
        $result = call_user_func([$class, $method], $object);
        return $result;
    }

    public static function updateObject($object, $fields){
        $class = "F" . substr(get_class($object), 1);
        $method = "saveObject";
        $result = call_user_func([$class, $method], $object, $fields);
        return $result;
    }

    public static function deleteObject($class, $id){
        $class = "F" . substr($class, 1);
        $method = "deleteObject";
        $result = call_user_func([$class, $method], $id);
        return $result;
    }
//---------------------USER METHODS----------------------------------
    public static function userExists($email){
        if(FRegisteredUser::userExists($email)){
            return true;
        } else {
            return false;
        }
    }

    public static function retrieveUser($email){
        $user = FRegisteredUser::getUserByEmail($email);
        return $user;
    }

    public static function getAllRooms(){
        $rooms = FRoom::getAllRooms();
        return $rooms;
    }
}

?>
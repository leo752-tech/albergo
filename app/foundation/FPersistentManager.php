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

    public static function getAll($class){
        $class = "F" . substr($class, 1);
        $method = "getAll";
        $result = call_user_func([$class, $method]);
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

    

    public static function getAllUsers(){
        $users = FUser::getAll();
        return $users;
    }

    public static function getAllRegisteredUsers(){
        $users = FRegisteredUser::getAll();
        return $users;
    }

    public static function getBookingsByUser(int $idRegisteredUser): array {
        return FBooking::getBookingsByUser($idRegisteredUser);
    }
    public static function hasBookings(int $idRegisteredUser): bool {
        $bookings = self::getBookingsByUser($idRegisteredUser);
        return !empty($bookings);
    }
//------------------ROOM METHODS--------------------------------------
    public static function getAllRooms(){
        $rooms = FRoom::getAll();
        return $rooms;
    }

    public static function getRoomsByBeds($beds){
        $rooms = FRoom::getRoomsByBeds($beds);
        return $rooms;
    }

//------------------BOOKING METHOD------------------------------------
    public static function getBookingsByPrice($price1, $price2){
        $bookings = FBooking::getBookingsByPrice($price1, $price2);
        return $bookings;
    }

    public static function getBookingsByRoom($idRoom){
        $bookings = FBooking::getBookingsByRoom($idRoom);
        return $bookings;
    }

    public static function getAllBookings(){
        $bookings = FBooking::getAll();
        return $bookings;
    }

//----------------EXTRASERVICE AND BOOKING METHOD---------------------
    public static function getBookingsExtraServices($idExtraService){
        $result = FExtraService::getExtraServiceByUsed($idExtraService);
        return $result;
    }
    
    public static function setBookingsExtraServices($idBooking, $idExtraService){
        $result = FExtraService::saveBookingsExtraServices($idBooking, $idExtraService);
        return $result;
    }

//-------------------REVIEW METHODS-----------------------------------
    public static function getAllReview(){
        $reviews = FReview::getAll();
        return $reviews;
    }

    public static function getAllSpecialOffer(){
        $specialOffer = FSpecialOffer::getAll();
        return $specialOffer;
    }



}

?>
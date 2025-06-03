<?php

class FBooking {

    private static $key = "idBooking";

    private static $class = "FBooking";
    
    private static $table = "bookings";
    
    private static $values = "(NULL,:idUser,:start,:end,:idRoom,:price,:bookingDate,:cancellation)";
    
    public function __construct(){}

    public static function bind($stmt, $booking) {
        $stmt->bindValue(":idUser", $booking->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(":start", $booking->getStart(), PDO::PARAM_STR);
        $stmt->bindValue(":end", $booking->getEnd(), PDO::PARAM_STR);
        $stmt->bindValue(":idRoom", $booking->getIdRoom(), PDO::PARAM_INT);
        $stmt->bindValue(":price", $booking->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(":bookingDate", $booking->getBookingDate(), PDO::PARAM_STR);
        $stmt->bindValue(":cancellation", $booking->getCancellation(), PDO::PARAM_BOOL);
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
        $booking = new EBooking($queryRes["idBooking"], $queryRes["userId"], $queryRes["start"], $queryRes["end"], $queryRes["roomId"], $queryRes["price"], $queryRes["bookingDate"], $queryRes["cancellation"]);
        return $booking;
    }

    public static function getObject($id){
        $result = FDataMapper::getInstance()->retrieveObject(self::$table, self::$key, $id);
        if(count($result) > 0){
            $booking = self::createObject($result);
            return $booking;
        } else {
            return null;
        }
    }

    public static function saveObject($object, $fields = null){
        if($fields === null){
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->saveObject(self::$class, $object);
            FDataMapper::getInstance()->commit();
            if($id !== null){
                $object->setId($id);
                return true;
            } else {
                return false;
            }
        } else {
            try {
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($fields as $f){
                    FDataMapper::getInstance()->updateObject(self::$table, $f[0], $f[1], self::$key, $object->getId());
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

    public static function deleteBooking($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->deleteObject(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            } else {
                echo "Booking does not exist";
                return false;
            }
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>
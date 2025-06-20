<?php

class FBooking {

    private static $key = "idBooking";

    private static $class = "FBooking";
    
    private static $table = "booking";
    
    
    public function __construct(){}

    private static $values = "(NULL, :idRegisteredUser, :idRoom, :checkInDate, :checkOutDate, :totalPrice, :bookingDate, :cancellation, :idSpecialOffer)";

    public static function bind($stmt, $booking) {
        $stmt->bindValue(":idRegisteredUser", $booking->getIdRegisteredUser(), PDO::PARAM_INT);
        $stmt->bindValue(":idRoom", $booking->getIdRoom(), PDO::PARAM_INT); 
        $stmt->bindValue(":checkInDate", $booking->getCheckInDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":checkOutDate", $booking->getCheckOutDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":totalPrice", $booking->getTotalPrice(), PDO::PARAM_STR);
        $stmt->bindValue(":bookingDate", $booking->getBookingDate()->format("Y-m-d"), PDO::PARAM_STR);
        $stmt->bindValue(":cancellation", $booking->getCancellation(), PDO::PARAM_BOOL);
        $stmt->bindValue(":idSpecialOffer", $booking->getIdSpecialOffer(), PDO::PARAM_INT);
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
        $booking = new EBooking($queryRes["idBooking"], $queryRes["idRegisteredUser"], new DateTime($queryRes["checkInDate"]), new DateTime( $queryRes["checkOutDate"]), $queryRes["idRoom"], $queryRes["totalPrice"], new DateTime($queryRes["bookingDate"]), $queryRes["idSpecialOffer"]);
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
            } finally {
                FDataMapper::getInstance()->closeConnection();
            }
        }
    }

    public static function deleteObject($id){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->deleteObject(self::$table, self::$key, $id);
                self::deleteBookingExtraService($id);
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

    public static function getAll(){
        $bookings = FDataMapper::getInstance()->selectAll(self::$table);
        return $bookings;
    }

    public static function getBookingsByRoom($idRoom){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            $rooms = FDataMapper::getInstance()->select(self::$table, "idRoom", $idRoom);
            FDataMapper::getInstance()->getDb()->commit();
            if(count($rooms)>0){return $rooms;}
            else{return $rooms = array();}
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getBookingsByUser(int $idRegisteredUser): array {
        try {
            $rawBookings = FDataMapper::getInstance()->select('booking','idRegisteredUser',$idRegisteredUser);

            $bookings = [];
            if (!empty($rawBookings)) {
                
                foreach ($rawBookings as $row) {
                    
                    $booking = new EBooking($row['idBooking'],$row['idRegisteredUser'],new DateTime($row['checkInDate']), new DateTime($row['checkOutDate']),$row['idRoom'], $row['totalPrice'],new DateTime($row['bookingDate']), (bool)$row['cancellation'] );
                    $bookings[] = $booking;
                }
            }
            return $bookings; 
            
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
        }
    



    public static function getBookingsByPrice($price1,$price2){
        try {
            FDataMapper::getInstance()->getDb()->beginTransaction();

            $bookings = FDataMapper::getInstance()->selectBetween(self::$table, "totalPrice", $price1, $price2);
            FDataMapper::getInstance()->getDb()->commit();
            if(count($bookings)>0){return $bookings;}
            else{return $bookings = array();}
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function deleteBookingExtraService($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();
            if(FDataMapper::getInstance()->exists(self::$table, self::$key, $id)){
                $result = FDataMapper::getInstance()->deleteObject('booking_extraservice', 'idBooking', $id);
                FDataMapper::getInstance()->getDb()->commit();
                return $result;
            } else {
                echo "Booking does not exist";
                return false;
            }
            
        }catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}


?>
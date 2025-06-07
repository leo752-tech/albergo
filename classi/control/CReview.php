<?php

class CReview {

    public static function createReview() {
        //oggetto view
        $review = new EReview(null, $title=UHTTP::post("title"), $rating=UHTTP::post("rating"),$description=UHTTP::post("description"),$date=new dateTime(UHTTP::post("date")), $idRegisteredUser=UHTTP::post("idRegisteredUser"));
        if (empty($title) || empty($rating) ||empty($description) || empty($date) || empty($idRegisteredUser)) {
            echo "ERROR: All fields (title, rating, date, user ID) are required.";
            return false;
        }
        $rating = (int)$rating; 
        if ($rating < 1 || $rating > 5) {
            echo "ERROR: The rating must be an integer between 1 and 5.";
            return false;}
        if (!FPersistentManager::getInstance()->hasBookings($idRegisteredUser)) {
            echo "ERROR: You cannot leave a review because you have no registered bookings.";
            return false;
        }
        $result = FPersistentManager::getInstance()->saveObject($review);
        //ritorna alla pagina precedente
        return $result;
    }


    public static function deleteReview($id) {
        //oggetto view
        $result = FPersistentManager::getInstance()->deleteObject('EReview', $id);
        //ritorna alla pagina precedente
        return $result;
    }

}
<?php

class CReview {

    public static function createReview() {
        //oggetto view
        $review = new EReview(null, UHTTP::post("title"), UHTTP::post("rating"),UHTTP::post("description"), new DateTime(UHTTP::post("date")), USession::getSessionElement("idRegisteredUser"));
        if (empty(UHTTP::post("title")) || empty(UHTTP::post("rating")) ||empty(UHTTP::post("description")) || empty(UHTTP::post("date"))) {
            echo "ERROR: All fields (title, rating, date, user ID) are required.";
            return false;
        }
        else{
            $rating = (int)UHTTP::post("rating"); 
            if (FPersistentManager::getInstance()->hasBookings($idRegisteredUser)) {
                $result = FPersistentManager::getInstance()->saveObject($review);
                //ritorna alla pagina precedente
                return $result;
            }
        }
        
    }


    public static function deleteReview($id) {
        //oggetto view
        $result = FPersistentManager::getInstance()->deleteObject('EReview', $id);
        //ritorna alla pagina precedente
        return $result;
    }

}
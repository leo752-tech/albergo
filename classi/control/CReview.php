<?php

class CReview {

    public static function createReview() {
        //oggetto view
        $review = new EReview(null, UHTTP::post("title"), UHTTP::post("rating"),UHTTP::post("description"),new dateTime(UHTTP::post("date")), UHTTP::post("idRegisteredUser"));
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
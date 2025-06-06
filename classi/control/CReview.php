<?php

class CReview {

    public static function createReview() {
        //oggetto view
        $review = new EReview(null, UHTTP::post("title"), UHTTP::post("rating"),UHTTP::post("description"),new dateTime(UHTTP::post("date")), UHTTP::post("idRegisteredUser"));
        $result = FPersistentManager::getInstance()->saveObject($review);
        //ritorna alla pagina precedente
        return $result;
    }

    public static function updateReview($id) {
        //oggetto view
        $changes = array();
        foreach(['text', 'rating'] as $field) {
            $change = array();
            if (UHTTP::post($field) !== null) {
                $change[] = $field;
                $change[] = UHTTP::post($field);
                $changes[] = $change;
            }
        }
        $review = FPersistentManager::getInstance()->getObject('EReview', $id);        
        $result = FPersistentManager::getInstance()->updateObject($review, $changes);
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
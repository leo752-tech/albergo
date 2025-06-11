<?php

class CSpecialOffer{

    public static function createSpecialOffer(){
        $specialOffer = new SpecialOffer(null, UHTTP::post('title'), UHTTP::post('description'), UHTTP::post('length'), UHTTP::post('specialPrice'));
        $result = FPersistentManager::getInstance()->saveObject($specialOffer);
    }

    public static function getAllSpecialOffer(){
        $specialOffer = FDataMapper::getInstance()->getAll("CSpecialOffer");
    }

    public static function deleteSpecialOffer($id){
        $result = FPersistentManager::getInstance()->deleteObject($id);
    }

}
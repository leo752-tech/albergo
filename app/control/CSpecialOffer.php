<?php

class CSpecialOffer{

    public static function createSpecialOffer(){
        $specialOffer = new SpecialOffer(null, UHTTP::post('title'), UHTTP::post('description'), UHTTP::post('length'), UHTTP::post('specialPrice'));
        $result = FPersistentManager::getInstance()->saveObject($specialOffer);
    }

}
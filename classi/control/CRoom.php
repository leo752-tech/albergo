<?php
class CRoom{
    public static function createRoom(){
        //istanza dell'oggetto view
        $room = new ERoom(null, UHTTP::post("name"), UHTTP::post("beds"), UHTTP::post("price"), UHTTP::post("type"));
        $result = FPersistentManager::getIstance()->saveObject($room);
        //reindirizzamento alla pagina precedente

    }
    

}
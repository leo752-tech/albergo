<?php
class CRoom {
    public static function createRoom(){
        //oggetto view
        $room= new ERoom(null, UHTTP::post("name"), UHTTP::post("beds"), UHTTP::post("price"), UHTTP::post("type"));
        $result=FPersistentManager::getInstance()->saveObject($room);
        //ritorna alla pagina precedente
        return $result;
    }
    public static function updateRoom($id){
        //oggetto view
        $changes= array();
        foreach(['name', 'beds', 'price', 'type'] as $field) {
            $change=array();
            if (UHTTP::post($field) !== null) {
                $change[] = $field;
                $change[] = UHTTP::post($field);
                $changes[] = $change;
            }
        }
        $room=FPersistentManager::getInstance()->getObject('ERoom', $id);        
        $result=FPersistentManager::getInstance()->updateObject($room, $changes);
        //ritorna alla pagina precedente
        return $result;
    }
    public static function deleteRoom($id){
        //oggetto view
        $result=FPersistentManager::getInstance()->deleteObject('ERoom', $id);
        //ritorna alla pagina precedente
        return $result;
    }
    public static function getAllRooms(){
        //oggetto view
        $rooms=FPersistentManager::getInstance()->getAllRooms();
        return $rooms;
        //pagina con tutte le camere
    }
}
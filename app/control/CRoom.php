<?php

class CRoom{

    public static function createRoom(){
        $view = new VRoom();
        $room= new ERoom(null, UHTTP::post("name"), UHTTP::post("beds"), UHTTP::post("price"), UHTTP::post("type"));
        $result=FPersistentManager::getInstance()->saveObject($room);
        $view->createRoom();
        return $result;
    }
    public static function updateRoom($id){
        $view = new VRoom();
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
        $view->createRoom();
        return $result;
    }
    
    public static function deleteRoom($id){
        $view = new VRoom();
        $result=FPersistentManager::getInstance()->deleteObject('ERoom', $id);
        $view->deleteRoom($id);
        return $result;
    }

    public static function getAllRooms(){
        $view = new VRoom();
        $rooms=FPersistentManager::getInstance()->getAllRooms();
        return $rooms;
        $view->showRooms($rooms);
    }
}

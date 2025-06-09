<?php
class VRoom{
    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showRooms($rooms){
        $this->smarty->assing('rooms', $rooms);
        $this->smarty->display('');
    }

    public function createRoom(){
        
        $this->smarty->display('');
    }

    public function deleteRoom($room){
        $this->smarty->assing('room', $room);
        $this->smarty->display('');
    }


}
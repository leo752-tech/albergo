<?php
class VRoom{
    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showRooms($rooms){
        $this->smarty->assign('rooms', $rooms);
        echo 'CAMERE: ' . count($rooms);
        $this->smarty->display('rooms.tpl');
    }

    public function createRoom(){
        
        $this->smarty->display('home.tpl');
    }

    public function deleteRoom($room){
        $this->smarty->assign('room', $room);
        $this->smarty->display('');
    }


}
<?php

class VBooking{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showSelect(){
        $this->smarty->display('selectDate.tpl');
    }

    public function showAvailableRooms($isLoggedIn, $roomsImages){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->assign('rooms', $roomsImages);
        $this->smarty->display('availableRooms.tpl');
    }

    public function showOffer($admin_logged_in, $specialOffers){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('specialOffers', $specialOffers);
        $this->smarty->display('manageSpecialOffer.tpl');
    }

    public function showDetailBooking($admin_logged_in, $room, $){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('specialOffers', $specialOffers);
        $this->smarty->display('manageSpecialOffer.tpl');
    }

}
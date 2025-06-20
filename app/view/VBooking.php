<?php

class VBooking{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showSelect(){
        $this->smarty->display('selectDate.tpl');
    }

    public function showOffer($admin_logged_in, $specialOffers){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('specialOffers', $specialOffers);
        $this->smarty->display('manageSpecialOffer.tpl');
    }

}
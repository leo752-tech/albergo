<?php

class VBooking{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showSelect(){
        $this->smarty->display('selectDate.tpl');
    }

}
<?php

class VError{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showError($isLoggedIn, $message){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('errorMessage', $message);
        $this->smarty->display('errorPage.tpl');
    }
}
<?php

class VError{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showError($isLoggedIn, $message, $pathUrl){
        $this->smarty->assign('is_logges_in', $isLoggedIn);
        $this->smarty->assign('errorMessage', $message);
        $this->smarty->assign('pathUrl', $pathUrl);
        $this->smarty->display('errorPage.tpl');
    }
}
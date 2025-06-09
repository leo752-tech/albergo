<?php

//require('C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty\libs\Smarty.class.php');


class VUserschizz{

    private $smarty;
    private $path;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();


    }

    /**
     * @throws SmartyException
     */
    public function home(){
        $this->smarty->display('home.tpl');
    }

    /**
     * Funzione che indirizza alla pagina con il form di login.
     * @throws SmartyException
     */
    /*
    public function showLoginForm(){
        $this->smarty->assign('error', false);
        $this->smarty->assign('ban',false);
        $this->smarty->assign('regErr',false);
        $this->smarty->display('login.tpl');
    }*/
}
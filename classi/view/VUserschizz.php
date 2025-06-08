<?php

//namespace classi\view; // Aggiungi il namespace

//use C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\installation\StartSmarty;
class VUserschizz{

    private $smarty;

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
    public function showLoginForm(){
        $this->smarty->assign('error', false);
        $this->smarty->assign('ban',false);
        $this->smarty->assign('regErr',false);
        $this->smarty->display('login.tpl');
    }
}
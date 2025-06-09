<?php


class VUserschizz{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function home($nome){
        $this->assign("nomeuser", $nome);
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
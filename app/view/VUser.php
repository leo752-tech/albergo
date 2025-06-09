<?php

//require('C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty\libs\Smarty.class.php');


class VUser{

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

    public function showFormsLogin(){
        $this->smarty->display('login.tpl');
    }

    public function showUsers($users){
        $this->smarty->assign('users', $users);
        $this->smarty->display();
    }

    public function insertUser($user){
        $this->smarty->assign('user', $user);
        $this->smarty->display();
    }
}
<?php

class VUser{

    private $smarty;
    private $path;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();


    }

    /**
     * @throws SmartyException
     */
    public function home(?EUser $user=null){
        $this->smarty->assign('user', $user);
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

    public function showUserProfile(EUser $user, array $bookings = [], array $reviews = []){
        $this->smarty->assign('user', $user);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->assign('reviews', $reviews);
        $this->smarty->display(''); 
    }

    public function manageUsers($users){
        $this->smarty->assign('users', $users);
        $this->smarty->display();
    }



}
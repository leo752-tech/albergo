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
    public function home($isLoggedIn){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->display('home.tpl');
    }

    public function showFormsLogin(){
        $this->smarty->display('login.tpl');
    }

    public function showFormsRegistration($isLoggedIn){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->display('registration.tpl');
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

    public function showAccountDetail($isLoggedIn, $user, $birthDate){
        $this->smarty->assign('birthDate', $birthDate);
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('user', $user);
        $this->smarty->display('manageAccountDetail.tpl');
    }

    public function showUpdateAccount($isLoggedIn, $user){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('user', $user);
        $this->smarty->display('updateAccount.tpl');
    }

    public function showUpdatePassword($isLoggedIn, $user){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('user', $user);
        $this->smarty->display('updatePassword.tpl');
    }

    public function showMyBookings($isLoggedIn, $bookings){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display('myBookings.tpl');
    }

    public function showMyReviews($isLoggedIn, $reviews){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->assign('reviews', $reviews);
        $this->smarty->display('myReview.tpl');
    }

    public function showSetReview($isLoggedIn){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->display('setReview.tpl');
    }

    public function showAllReviews($isLoggedIn, $allReview){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->assign('allReviews', $allReview);
        $this->smarty->display('allReview.tpl');
    }

    public function showSpecialOffer($isLoggedIn, $specialOffer){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->assign('specialOffer', $specialOffer);
        $this->smarty->display('showOffer.tpl');
    }

    public function showService($isLoggedIn, $services){
        $this->smarty->assign('isLoggedIn', $isLoggedIn);
        $this->smarty->assign('services', $services);
        $this->smarty->display('showExtraService.tpl');
    }


}
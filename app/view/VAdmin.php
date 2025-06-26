<?php
class VAdmin {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Home amministratore
    public function dashboard($admin_is_logged, $totalUsers) {
        $this->smarty->assign('admin_logged_in', $admin_is_logged);
        $this->smarty->assign('totalUsers', $totalUsers);
        $this->smarty->display('dashboardAdmin.tpl');
    }
//-----------------------------USER----------------------------------------------
    public function manageUsers($admin_logged_in, $users, $regUsers){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('users', $users);
        $this->smarty->assign('registeredUsers', $regUsers);
        $this->smarty->display('manageUsers.tpl');
    }

    public function showInsertUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('insertUser.tpl');
    }

    public function showInsertRegisteredUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('insertRegisteredUser.tpl');
    }

    public function showUpdateUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('updateUser.tpl');
    }

    public function showUpdateRegisteredUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('updateRegisteredUser.tpl');
    }
    
//--------------------------ROOM------------------------------------------------------------

    public function manageRooms($admin_logged_in, $rooms) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('rooms', $rooms);
        $this->smarty->display('manageRooms.tpl');
    }

    public function showUpdateRoom($admin_logged_in) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('updateRoom.tpl');
    }

    public function showInsertRoom($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('insertRoom.tpl');
    }   
    
//------------------------BOOKING-------------------------------------------------

    public function manageBookings() {
        //$this->smarty->assign('admin_logged_in', $admin_logged_in);
        //$this->smarty->assign('bookings', $books);
        $this->smarty->display('calendar.tpl');
    }
    
    public function showBookingDetail( $bookings, $date){
        $this->smarty->assign('readableDate', $date);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display('detailBooking.tpl');
    }
  
    public function showInsertBooking($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('showInsertBooking.tpl');
    }

//---------------------------------SERVICE------------------------------------------------

    public function manageExtraServices($admin_logged_in, $services){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('services', $services);
        $this->smarty->display('manageExtraService.tpl');
    }

    public function showUpdateService($admin_logged_in) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('updateService.tpl');
    }

    public function manageOffers($admin_logged_in, $offers) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('policies', $offers);
        $this->smarty->display('manageOffers.tpl');
    }

    public function showInsertOffer($admin_logged_in) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('insertOffer.tpl');
    }



    
    // Mostra la lista delle recensioni
    public function showReviews(array $reviews) {
        $this->smarty->assign('reviews', $reviews);
        $this->smarty->display('admin_reviews.tpl');
    }

    // Mostra il dettaglio di una recensione
    public function showReviewDetail(array $review) {
        $this->smarty->assign('review', $review);
        $this->smarty->display('admin_review_detail.tpl');
    }
}
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
    public function manageUsers($admin_logged_in, $users){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('users', $users);
        $this->smarty->display('manageUsers.tpl');
    }

    public function showInsertUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('insertUser.tpl');
    }

    public function showUpdateUser($admin_logged_in){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('updateUser.tpl');
    }

    // Visualizza lista prenotazioni
    public function manageBookings($admin_logged_in, $books) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('bookings', $books);
        $this->smarty->display('manageBookings.tpl');
    }

    // Visualizza lista camere
    public function manageRooms($admin_logged_in, $rooms) {
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('rooms', $rooms);
        $this->smarty->display('manageRooms.tpl');
    }

    // Mostra form per aggiungere/modificare una camera
    public function showUpdateRoom($admin_logged_in) {
        $this->smarty->assign('roomData', $roomData);
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->display('admin_room_form.tpl');
    }

    public function manageExtraSevices($admin_logged_in, $services){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('services', $services);
        $this->smarty->display('manageUsers.tpl');
    }

    // Mostra messaggio di errore
    public function showError(string $message) {
        $this->smarty->assign('error', $message);
        $this->smarty->display('admin_error.tpl');
    }

    // Mostra messaggio di successo
    public function showSuccess(string $message) {
        $this->smarty->assign('message', $message);
        $this->smarty->display('admin_success.tpl');
    }
    // Mostra il dettaglio di un utente
    public function showUserDetail(array $user) {
        $this->smarty->assign('user', $user);
        $this->smarty->display('admin_user_detail.tpl');
    }

    // Mostra il dettaglio di una prenotazione
    public function showBookingDetail(array $booking) {
        $this->smarty->assign('booking', $booking);
        $this->smarty->display('admin_booking_detail.tpl');
    }

    // Mostra il dettaglio di una camera
    public function showRoomDetail(array $room) {
        $this->smarty->assign('room', $room);
        $this->smarty->display('admin_room_detail.tpl');
    }

    // Mostra form per aggiungere/modificare una prenotazione
    public function showBookingForm(array $bookingData = [], ?string $error = null) {
        $this->smarty->assign('bookingData', $bookingData);
        $this->smarty->assign('error', $error);
        $this->smarty->display('admin_booking_form.tpl');
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
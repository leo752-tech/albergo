<?php
class VAdmin {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Home amministratore
    public function home() {
        $this->smarty->display('dashboardAdmin2.tpl');
    }
    // Dashboard amministratore
    public function dashboard(array $stats = []) {
        $this->smarty->assign('stats', $stats);
        $this->smarty->display('admin_dashboard.tpl');
    }

    // Visualizza lista utenti
    public function showUsers(array $users) {
        $this->smarty->assign('users', $users);
        $this->smarty->display('admin_users.tpl');
    }

    // Visualizza lista prenotazioni
    public function showBookings(array $bookings) {
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display('admin_bookings.tpl');
    }

    // Visualizza lista camere
    public function showRooms(array $rooms) {
        $this->smarty->assign('rooms', $rooms);
        $this->smarty->display('admin_rooms.tpl');
    }

    // Mostra form per aggiungere/modificare una camera
    public function showRoomForm(array $roomData = [], ?string $error = null) {
        $this->smarty->assign('roomData', $roomData);
        $this->smarty->assign('error', $error);
        $this->smarty->display('admin_room_form.tpl');
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
<?php

class VBooking{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showSelect(){
        $this->smarty->display('selectDate.tpl');
    }

    public function showAvailableRooms($isLoggedIn, $roomsImages){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('rooms', $roomsImages);
        $this->smarty->display('availableRooms.tpl');
    }

    public function showOffer($admin_logged_in, $specialOffers){
        $this->smarty->assign('admin_logged_in', $admin_logged_in);
        $this->smarty->assign('specialOffers', $specialOffers);
        $this->smarty->display('manageSpecialOffer.tpl');
    }

    public function showDetailBooking($isLoggedIn, $room, $images, $services){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('room', $room);
        $this->smarty->assign('images', $images);
        $this->smarty->assign('extraServices', $services);
        $this->smarty->display('detailRoom.tpl');
    }

    public function showSummary($isLoggedIn, $room, $booking, $servObj){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('room', $room);
        $this->smarty->assign('booking', $booking);
        $this->smarty->assign('selectedExtraServices', $servObj);
        $this->smarty->display('summaryBooking.tpl');
    }

    public function showPayment($isLoggedIn, $idBooking, $totalPrice){
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('idBooking', $idBooking);
        $this->smarty->assign('totalPrice', $totalPrice);
        $this->smarty->display('payment.tpl');
    }

}
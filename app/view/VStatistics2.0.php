<?php
class VStatistics2{

    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function roomOccupancyRate($occupied, $total){
        $this->smarty->assign('occupied', $occupied);
        $this->smarty->assign('total', $total);
        $this->smarty->display();
    }

    public function nightsPerStay($occupied, $bookings){
        $this->smarty->assign('occupied', $occupied);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display();
    }

    public function cancellationRate($cancellation, $bookings){
        $this->smarty->assign('occupied', $cancellation);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display();
    }

    public function roomRevenue($totalRevenue){
        $this->smarty->assign('totalRevenue', $totalRevenue);
        $this->smarty->display();
    }

    public function extraServiceRevenue($totalRevenue){
        $this->smarty->assign('totalRevenue', $totalRevenue);
        $this->smarty->display();
    }

    public function reviewRating($rating){
        $this->smarty->assign('rating', $rating);
        $this->smarty->display();
    }

    public function frequentKeyword($frequentKeyword){
        $this->smarty->assign('frequentKeyword', $frequentKeyword);
        $this->smarty->display();
    }

}
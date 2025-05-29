<?php

class EBooking {

	private ?int $idBooking;
	private $idRegisteredUser;
	private DateTime $checkInDate;
	private DateTime $checkOutDate;
	private $idRoom;
	private $totalPrice;
	private DateTime $bookingDate;
	private $cancellation = false;

	public function __construct($idRegisteredUser, $checkInDate, $checkOutDate, $idRoom, $totalPrice, ?string $bookingDate = null){
		$this->idBooking = null;
		$this->idRegisteredUser = $idRegisteredUser;
		$this->checkInDate = $checkInDate;
		$this->checkOutDate = $checkOutDate;
		$this->idRoom = $idRoom;
		$this->totalPrice = $totalPrice;
		$this->bookingDate = $bookingDate ?? date('Y-m-d');
	}

	public function getId(){
		return $this->idBooking;
	}
	public function setId($idBooking){
		$this->idBooking = $idBooking;
	}

	public function getIdRegisteredUser(){
		return $this->idRegisteredUser;
	}
	public function setIdRegisteredUser($idRegisteredUser){
		$this->idRegisteredUser = $idRegisteredUser;
	}

	public function getCheckInDate(){
		return $this->checkInDate;
	}
	public function setCheckInDate($checkInDate){
		$this->checkInDate = $checkInDate;
	}

	public function getCheckOutDate(){
		return $this->checkOutDate;
	}
	public function setCheckOutDate($checkOutDate){
		$this->checkOutDate = $checkOutDate;
	}

	public function getIdRoom(){
		return $this->idRoom;
	}
	public function setIdRoom($idRoom){
		$this->idRoom = $idRoom;
	}

	public function getTotalPrice(){
		return $this->totalPrice;
	}
	public function setTotalPrice($totalPrice){
		$this->totalPrice = $totalPrice;
	}

	public function getBookingDate(){
		return $this->bookingDate;
	}
	public function setBookingDate($bookingDate){
		$this->bookingDate = $bookingDate;
	}

	public function getCancellation(){
		return $this->cancellation;
	}
	public function setCancellation($cancellation){
		$this->cancellation = $cancellation;
	}
}

?>
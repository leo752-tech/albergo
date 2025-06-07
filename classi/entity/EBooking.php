<?php

class EBooking {

	private ?int $idBooking;
	private int $idRegisteredUser;
	private DateTime $checkInDate;
	private DateTime $checkOutDate;
	private int $idRoom;
	private float $totalPrice;
	private DateTime $bookingDate;
	private bool $cancellation = false;
	private ?int $idSpecialOffer;

	public function __construct(?int $idBooking = null, int $idRegisteredUser, DateTime $checkInDate, DateTime $checkOutDate, int $idRoom, float $totalPrice, ?DateTime $bookingDate = null, ?int $idSpecialOffer = null){
		$this->idBooking = $idBooking;
		$this->idRegisteredUser = $idRegisteredUser;
		$this->checkInDate = $checkInDate;
		$this->checkOutDate = $checkOutDate;
		$this->idRoom = $idRoom;
		$this->totalPrice = $totalPrice;
		$this->bookingDate = $bookingDate ?? new DateTime();
		$this->idSpecialOffer = $idSpecialOffer;
	}

	public function getId(): ?int{
		return $this->idBooking;
	}
	public function setId(int $idBooking){
		$this->idBooking = $idBooking;
	}

	public function getIdRegisteredUser(): int{
		return $this->idRegisteredUser;
	}
	public function setIdRegisteredUser(int $idRegisteredUser){
		$this->idRegisteredUser = $idRegisteredUser;
	}

	public function getCheckInDate(): DateTime{
		return $this->checkInDate;
	}
	public function setCheckInDate(DateTime $checkInDate){
		$this->checkInDate = $checkInDate;
	}

	public function getCheckOutDate(): DateTime{
		return $this->checkOutDate;
	}
	public function setCheckOutDate(DateTime $checkOutDate){
		$this->checkOutDate = $checkOutDate;
	}

	public function getIdRoom(): int{
		return $this->idRoom;
	}
	public function setIdRoom(int $idRoom){
		$this->idRoom = $idRoom;
	}

	public function getTotalPrice(): float{
		return $this->totalPrice;
	}
	public function setTotalPrice(float $totalPrice){
		$this->totalPrice = $totalPrice;
	}

	public function getBookingDate(): DateTime{
		return $this->bookingDate;
	}
	public function setBookingDate(DateTime $bookingDate){
		$this->bookingDate = $bookingDate;
	}

	public function getCancellation(): bool{
		return $this->cancellation;
	}
	public function setCancellation(bool $cancellation){
		$this->cancellation = $cancellation;
	}

	public function getIdSpecialOffer(): ?int{
		return $this->idSpecialOffer;
	}
	public function setIdSpecialOffer(int $idSpecialOffer){
		$this->idSpecialOffer = $idSpecialOffer;
	}
}

?>
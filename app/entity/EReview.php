<?php

class EReview{

	private ?int $idReview;
	private string $title;
	private int $rating;
	private string $description;
	private DateTime $date;
	private int $idRegisteredUser;

	public function __construct(?int $idReview = null, string $title, int $rating, string $description, DateTime $date, int $idRegisteredUser){
		$this->idReview = $idReview;
		$this->title = $title;
		$this->rating = $rating;
		$this->description = $description;
		$this->date = $date;
		$this->idRegisteredUser = $idRegisteredUser;
	}

	public function setId(int $id){
		$this->idReview = $id;
	}
	public function getId(): ?int{
		return $this->idReview;
	}

	public function setTitle(string $title){
		$this->title = $title;
	}
	public function getTitle(): string{
		return $this->title;
	}

	public function setRating(int $rating){
		$this->rating = $rating;
	}
	public function getRating(): int{
		return $this->rating;
	}

	public function setDescription(string $description){
		$this->description = $description;
	}
	public function getDescription(): string{
		return $this->description;
	}

	public function setDate(DateTime $date){
		$this->date = $date;
	}
	public function getDate(): DateTime{
		return $this->date;
	}

	public function setIdRegisteredUser(int $idRegisteredUser){
		$this->idRegisteredUser = $idRegisteredUser;
	}
	public function getIdRegisteredUser(): int{
		return $this->idRegisteredUser;
	}
}

?>
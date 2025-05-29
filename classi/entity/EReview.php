<?php

class EReview{

	private ?int $id;
	private string $title;
	private int $rating;
	private string $description;
	private DateTime $date;
	private int $userId;

	public function __construct(string $title, int $rating, string $description, DateTime $date, int $userId){
		$this->id = null;
		$this->title = $title;
		$this->rating = $rating;
		$this->description = $description;
		$this->date = $date;
		$this->userId = $userId;
	}

	public function setId(int $id){
		$this->id = $id;
	}
	public function getId(): ?int{
		return $this->id;
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

	public function setUserId(int $userId){
		$this->userId = $userId;
	}
	public function getUserId(): int{
		return $this->userId;
	}
}

?>
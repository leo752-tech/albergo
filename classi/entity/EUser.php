<?php

class EUser{
	
	protected ?int $id;
	protected string $firstName;
	protected string $lastName;
	protected DateTime $birthdDate;
	protected string $birthPlace;

	public function __construct(?int $id = null, string $firstName, string $lastName, DateTime $birthdDate, string $birthPlace){
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->$birthdDate = $birthdDate;
		$this->$birthPlace = $birthPlace;
	}

	public function setId(?int $id){
		$this->id = $id;
	}
	public function getId(): ?int{
		return $this->id;
	}

	public function setFirstName(string $firstName){
		$this->firstName = $firstName;
	}
	public function getFirstName(): string{
		return $this->firstName;
	}
	public function setLastName(string $lastName){
		$this->lastName = $lastName;
	}
	public function getLastName(): string{
		return $this->lastName;
	}
	public function setBirthdDate(DateTime $birthdDate){
		$this->birthdDate = $birthdDate;
	}
	public function getBirthdDate(): DateTime{
		return $this->birthdDate;
	}
	public function setBirthPlace(string $birthPlace){
		$this->birthPlace = $birthPlace;
	}
	public function getBirthPlace(): string{
		return $this->birthPlace;
	}
	}

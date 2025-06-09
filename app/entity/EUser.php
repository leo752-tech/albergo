<?php

class EUser{
	
	protected ?int $idUser;
	protected string $firstName;
	protected string $lastName;
	protected DateTime $birthDate;
	protected string $birthPlace;

	public function __construct(?int $idUser = null, string $firstName, string $lastName, DateTime $birthDate, string $birthPlace){
		$this->idUser = $idUser;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->birthDate = $birthDate;
		$this->birthPlace = $birthPlace;
	}

	public function setIdUser(?int $id){
		$this->idUser = $id;
	}
	public function getIdUser(): ?int{
		return $this->idUser;
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
	public function setBirthDate(DateTime $birthDate){
		$this->birthDate = $birthDate;
	}
	public function getBirthDate(): DateTime{
		return $this->birthDate;
	}
	public function setBirthPlace(string $birthPlace){
		$this->birthPlace = $birthPlace;
	}
	public function getBirthPlace(): string{
		return $this->birthPlace;
	}

}
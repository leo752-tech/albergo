<?php

class ERegisteredUser extends EUser{
	
	private ?int $idRegisteredUser;
	private string $email;
	private string $password;

	public function __construct(?int $idRegisteredUser = null, ?int $userId = null, string $email, string $password, string $firstName, string $lastName, DateTime $dateOfBirth, string $placeOfBirth){
		parent::__construct($userId, $firstName, $lastName, $dateOfBirth, $placeOfBirth);

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->idRegisteredUser = $idRegisteredUser;
		$this->email = $email;
		$this->password = $hashedPassword;
	}

	public function setIdRegisteredUser(?int $id){
		$this->idRegisteredUser = $id;
	}
	public function getIdRegisteredUser(): ?int{
		return $this->idRegisteredUser;
	}

	public function setEmail(string $email){
		$this->email = $email;
	}
	public function getEmail(): string{
		return $this->email;
	}

	public function setHashedPassword(string $hashedPassword){
		$this->password = $hashedPassword;
	}

	public function setPassword(string $password){
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->password = $hashedPassword;
	}
	public function getPassword(): string{
		return $this->password;
	}
}

?>
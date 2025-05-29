<?php

class ERegisteredUser extends EUser{
	
	private ?int $id;
	private string $email;
	private string $password;

	public function __construct(?int $id = null, ?int $userId = null, string $email, string $password, string $firstName, string $lastName, DateTime $dateOfBirth, string $placeOfBirth){
		parent::__construct($userId, $firstName, $lastName, $dateOfBirth, $placeOfBirth);

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->id = $id;
		$this->email = $email;
		$this->password = $hashedPassword;
	}

	public function setId(?int $id){
		$this->id = $id;
	}
	public function getId(): ?int{
		return $this->id;
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
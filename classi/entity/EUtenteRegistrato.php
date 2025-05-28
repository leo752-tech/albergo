<?php

class EUtenteRegistrato extends EUtente{
	
	
	private ?int $idUtenteRegistrato;
	private string $mail;
	private string $password;

	public function __construct(?int $idUtenteRegistrato = null, ?int $idUtente = null, $mail, $password, $nome, $cognome, $dataNascita, $comuneNascita){
		parent::__construct($idUtente, $nome, $cognome, $dataNascita, $comuneNascita);

		$hashPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->idUtenteRegistrato = $idUtenteRegistrato;
		$this->mail = $mail;
		$this->password = $hashPassword;
	}

	public function setIdUtenteRegistrato($idUtenteRegistrato){
		$this->idUtenteRegistrato = $idUtenteRegistrato;
	}
	public function getIdUtenteRegistrato(){
		return $this->idUtenteRegistrato;
	}

	public function setMail(string $mail){
		$this->mail = $mail;
	}
	public function getMail(){
		return $this->mail;
	}

	public function setHashPassword($hash){
		$this->password = $hash;
	}

	public function setPassword(string $password){
		$hashPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->password = $hashPassword;
	}
	public function getPassword(){
		return $this->password;
	}
}


?>
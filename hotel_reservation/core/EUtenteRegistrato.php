<?php

class EUtenteRegistrato extends EUtente{
	
	
	private string $mail;
	private string $password;
	private $idPrenotazioni = array();
	private $idRecensioni = array();

	public function __construct($mail, $password, $nome, $cognome, $dataN, $comuneN){
		parent::__construct($nome, $cognome, $dataN, $comuneN);
		$this->mail = $mail;
		$this->password = $password;
	}

	public function setMail(string $mail){
		$this->mail = $mail;
	}
	public function getMail(){
		return $this->mail;
	}

	public function setPassword(string $password){
		$this->password = $password;
	}
	public function getPassword(){
		return $this->password;
	}

	public function setIdPrenotazioni($idPrenotazione){
		$this->idPrenotazioni[] = $idPrenotazione;
	}
	public function getIdPrenotazioni(){
		return $this->idPrenotazioni;
	}

	public function setIdRecensioni($idRecensione){
		$this->idRecensioni[] = $idRecensione;
	}
	public function getIdRecensioni(){
		return $this->idRecensioni;	
	}
}


?>
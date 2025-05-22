<?php

class EUtente{
	
	private ?int $idUtente;
	private string $mail;
	private string $password;
	private string $nome;
	private string $cognome;
	private string $dataN;
	private string $comuneN;
	private $prenotazioni = array();
	private $recensioni = array();

	public function __construct($mail, $password, $nome, $cognome, $dataN, $comuneN){
		$this->idUtente = null;
		$this->mail = $mail;
		$this->password = $password;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->dataN = $dataN;
		$this->comuneN = $comuneN;
	}

	public function setIdUtente($idUtente){
		$this->idUtente = $idUtente;
	}
	public function getIdUtente(){
		return $this->idUtente;
	}

	public function setMail(string $Mail){
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

	public function setNome(string $nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCognome(string $cognome){
		$this->cognome = $cognome;
	}
	public function getCognome(){
		return $this->cognome;
	}
	public function setDataN(string $dataN){
		$this->dataN = $dataN;
	}
	public function getDataN(){
		return $this->dataN;
	}
	public function setComuneN(string $comuneN){
		$this->comuneN = $comuneN;
	}
	public function getComuneN(){
		return $this->comuneN;
	}
	public function setPrenotazioni($prenotazione){
		$this->prenotazioni[] = $prenotazione;
	}
	public function getPrenotazioni(){
		return $this->prenotazioni;
	}

	public function setRecensioni($recensione){
		$this->recensioni[] = $recensione;
	}
	public function getRecensioni(){
		return $this->recensioni;	
	}
}


?>

<?php

class ECamera{
	private ?int $idCamera;
	private string $nome;
	private int $posti;
	//prezzo per ogni notte
	private int $prezzo;
	private $tipo;
	//lista di Periodi nei quali la camera è occupata
	private $occupazioni = array();
	//elenco delle prenotazioni effettuate su questa camera
	private $prenotazioni = array();

	public function __construct($nome, $posti, $prezzo, $tipo){
		$this->idCamera = null;
		$this->nome = $nome;
		$this->posti = $posti;
		$this->prezzo = $prezzo;
		$this->tipo = $tipo;
	}

	public function setIdCamera(int $idCamera){
		$this->idCamera = $idCamera;
	}
	public function getIdCamera(){
		return $this->idCamera;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setPosti(int $posti){
		$this->posti = $posti;
	}
	public function getPosti(){
		return $this->posti;
	}

	public function setPrezzo(int $prezzo){
		$this->prezzo = $prezzo;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}

	public function setTipo(int $tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}

	public function setOccupazioni($prenotazione){
		$periodo = $prenotazione->getPeriodo();
		$this->occupazioni[] = $periodo;
		
	}
	public function getOccupazioni(){
		return $this->occupazioni;
	}

	public function setPrenotazioni($prenotazione){
		$this->prenotazioni[] = $prenotazione;
	}
	public function getPrenotazioni(){
		return $this->prenotazioni;
	}



}


?>

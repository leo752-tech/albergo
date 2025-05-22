<?php

class ERecensione{

	private ?int $idRecensione;
	private $titolo;
	private $valutazione;
	private $descrizione;
	private $data;

	public function __constructor($titolo, $valutazione, $descrizione, $data){
		$idRecensione = null;
		$this->titolo = $titolo;
		$this->valutazione = $valutazione;
		$this->descrizione = $descrizione;
		$this->data = $data;
	}

	public function setIdRecensione($idRecensione){
		$this->idRecensione = $idRecensione;
	}
	public function getIdRecensione(){
		return $this->idRecensione;
	}

	public function setTitolo($titolo){
		$this->titolo = $titolo;
	}
	public function getTitolo(){
		return $this->titolo;
	}

	public function setValutazione($valutazione){
		$this->valutazione = $valutazione;
	}
	public function getValutazione(){
		return $this->valutazione;
	}

	public function setDescrizione($descrizione){
		$this->descrizione = $descrizione;
	}
	public function getDescrizione(){
		return $this->descrizione;
	}

	public function setData($data){
		$this->data = $data;
	}
	public function getData(){
		return $this->data;
	}
}

?>

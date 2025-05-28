<?php

class ERecensione{

	private ?int $idRecensione;
	private $titolo;
	private $valutazione;
	private $descrizione;
	private DateTime $data;
	private $idUtenteRegistrato;

	public function __construct($titolo, $valutazione, $descrizione, $data, $idUtenteRegistrato){
		$this->idRecensione = null;
		$this->titolo = $titolo;
		$this->valutazione = $valutazione;
		$this->descrizione = $descrizione;
		$this->data = $data;
		$this->idUtenteRegistrato = $idUtenteRegistrato;
	}

	public function setId($id){
		$this->idRecensione = $id;
	}
	public function getId(){
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

	public function setIdUtente($idUtente){
		$this->idUtente = $idUtente;
	}
	public function getIdUtente(){
		return $this->idUtente;
	}
}

?>
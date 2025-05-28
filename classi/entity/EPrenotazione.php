<?php

class EPrenotazione{

	private ?int $idPrenotazione;
	private $idUtenteRegistrato;
	private DateTime $dataCheckIn;
	private DateTime $dataCheckOut;
	private $idCamera;
	private $prezzoTotale;
	private DateTime $dataPrenotazione;
	private $cancellazione = false; 

	public function __construct($idUtenteRegistrato, $dataCheckIn, $dataCheckOut, $idCamera, $prezzoTotale, ?string $dataPrenotazione = null){
		$this->idPrenotazione = null;
		$this->idUtente = $idUtente;
		$this->dataCheckIn = $dataCheckIn;
		$this->dataCheckOut = $dataCheckOut;
		$this->idCamera = $idCamera;
		$this->prezzo = $prezzoTotale;
		$this->dataPrenotazione = $dataPrenotazione ?? date('Y-m-d');
	}

	public function getId(){
		return $this->idPrenotazione;
	}
	public function setId($idPrenotazione){
		$this->idPrenotazione = $idPrenotazione;
	}

	public function getIdUtenteRegistrato(){
		return $this->idUtenteRegistrato;
	}
	public function setIdUtenteRegistrato($idUtenteRegistrato){
		$this->idUtenteRegistrato = $idUtenteRegistrato;
	}

	public function getDataCheckIn(){
		return $this->dataCheckIn;
	}
	public function setDataChekIn($dataCheckIn){
		$this->dataCheckIn = $dataCheckIn;
	}

	public function getDataCheckOut(){
		return $this->dataCheckOut;
	}
	public function setDataCheckOut($dataCheckOut){
		$this->dataCheckOut = $dataCheckOut;
	}

	public function getIdCamera(){
		return $this->idCamera;
	}
	public function setIdCamera($idCamera){
		$this->prezzo = $idCamera;
	}

	public function getPrezzoTotale(){
		return $this->prezzoTotale;
	}
	public function setPrezzoTotale($prezzoTotale){
		$this->prezzoTotale = $prezzoTotale;
	}

	public function getDataPrenotazione(){
		return $this->dataPrenotazione;
	}
	public function setDataPrenotazione($dataPrenotazione){
		$this->dataPrenotazione = $dataPrenotazione;
	}

	public function getCancellazione(){
		return $this->cancellazione;
	}
	public function setCancellazione($canc){
		$this->cancellazione = $canc;
	}
}


?>
<?php

class EPrenotazione{

	private ?int $idPrenotazione;
	private $idUtente;
	//decidere se elenco di stringhe o elenco di Utenti
	private $idUtenti = array();
	private $idPeriodo;
	private $idCamera;
	private ?int $idServizioExtra;
	private $prezzo;
	private $cancellazione = false; 

	public function __construct($idUtente, $idUtenti, $idPeriodo, $idCamera, ?int $idServizioExtra = null, ?int $prezzo = null){
		$this->idPrenotazione = null;
		$this->idUtente = $idUtente;
		$this->idUtenti = $idUtenti;
		$this->idPeriodo = $idPeriodo;
		$this->idCamera = $idCamera;
		if($idServizioExtra != null){$this->idServizioExtra = $idServizioExtra;}
		if($prezzo != null){$this->prezzo = $prezzo;}	
	}
//non ci sono i metodi setter (fatta eccezione per il prezzo che varia in maniera dinamica) perchè la prenotazione quando viene effettuata non può essere modificata, ma solo cancellata
	public function setIdPrenotazione($idPrenotazione){
		$this->idPrenotazione = $idPrenotazione;
	}
	public function getIdPrenotazione(){
		return $this->idPrenotazione;
	}

	public function getIdUtente(){
		return $this->idUtente;
	}
	
	public function getIdUtenti(){
		return $this->idUtenti;
	}
	public function getIdPeriodo(){
		return $this->idPeriodo;
	}
	public function getIdCamera(){
		return $this->idCamera;
	}

	public function getPrezzo(){
		return $this->prezzo;
	}
	public function setPrezzo($prezzo){
		$this->prezzo = $prezzo;
	}

	public function getCancellazione(){
		return $this->cancellazione;
	}
	public function setCancellazione(){
		$this->cancellazione = true;
	}

	public function getIdServizioExtra(){
		return $this->idServizioExtra;
	}
	
	 

}


?>

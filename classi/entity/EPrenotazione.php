<?php

class EPrenotazione{

	private ?int $idPrenotazione;
	private $utente;
	//decidere se elenco di stringhe o elenco di Utenti
	private $utenti = array();
	private $periodo;
	private $camera;
	private $prezzo;
	private ?EServizioExtra $servizio;
	private $cancellazione = false; 

	public function __construct($utente, $utenti, $periodo, $camera, ?EServizioExtra $servizio = null){
		$this->idPrenotazione = null;
		$this->utente = $utente;
		$this->utenti = $utenti;
		$this->periodo = $periodo;
		$this->camera = $camera;
		$this->servizio = $servizio;
		$this->prezzo = $this->setPrezzo($periodo, $camera, $servizio);
		//collegamento di questo oggetto con le classi EUtente e ECamera
		$utente->setPrenotazioni($this);
		$camera->setPrenotazioni($this);
		$camera->setOccupazioni($this);
	}
//non ci sono i metodi setter (fatta eccezione per il prezzo che varia in maniera dinamica) perchè la prenotazione quando viene effettuata non può essere modificata, ma solo cancellata
	public function setIdPrenotazione($idPrenotazione){
		$this->idPrenotazione = $idPrenotazione;
	}
	public function getIdPrenotazione(){
		return $this->idPrenotazione;
	}

	public function getUtente(){
		return $this->utente;
	}
	public function getUtenti(){
		return $this->utenti;
	}
	public function getPeriodo(){
		return $this->periodo;
	}
	public function getCamera(){
		return $this->camera;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}
	private function setPrezzo($periodo, $camera, $servizio){
		$incremento = 20;
		$incrementoServizio =  0;
		//se c'è un servizio l'incremento del prezzo viene aggiornato
		if(isset($servizio)){$incrementoServizio = $servizio->getPrezzo();}
		
		$giorni = $periodo->getLunghezza();
		$prezzoUnitario = $camera->getPrezzo();
		if($periodo->getTipo()=="alta"){$prezzoUnitario += $incremento;}
		if(isset($servizio)){$prezzoUnitario += $incrementoServizio;}

		return $giorni*$prezzoUnitario;
	}
	public function getCancellazione(){
		return $this->cancellazione;
	}
	public function setCancellazione(){
		$this->cancellazione = true;
	}

	public function getServizio(){
		return $this->servizio;
	}
	
	 

}


?>

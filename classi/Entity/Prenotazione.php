<?php

class Prenotazione{

	private $utente;
	//decidere se elenco di stringhe o elenco di Utenti
	private $utenti = array();
	private $periodo;
	private $camera;
	private $prezzo;
	private $cancellazione = false; 

	public function __construct($utente, $utenti, $periodo, $camera){
		$this->utente = $utente;
		$this->utenti = $utenti;
		$this->periodo = $periodo;
		$this->camera = $camera;
		//da modificare in base alle politiche prezzo e al periodo
		$this->prezzo = ($this->camera->getPrezzo())*($this->periodo->getLunghezza());
	}
//non ci sono i metodi setter perchè la prenotazione quando viene effettuata non può essere modificata, ma solo cancellata
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
	public function getCancellazione(){
		return $this->cancellazione;
	}
	public function setCancellazione(){
		$this->cancellazione = true;
	}
	 

}


?>
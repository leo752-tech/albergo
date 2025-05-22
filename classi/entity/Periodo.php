<?php


class Periodo{

	private DateTime $inizio;
	private DateTime $fine;
	private $lunghezza;
	private string $tipo;

	//private $periodi = array("altaStagione"=>$periodiAlta, "bassaStagione"=>$periodiBassa);
	private $periodiAlta = array();
	private $periodiBassa = array();

	
	public function __construct(DateTime $inizio, DateTime $fine){
		$this->inizio = $inizio;
		$this->fine = $fine;
		$this->lunghezza = $this->setLunghezza();
		
	}

	public function setInizio($inizio){
		$this->inizio = $inizio;
	}
	public function getInizio(){
		return $this->inizio;
	}
	public function setFine($fine){
		$this->fine = $fine;
	}
	public function getFine(){
		return $this->fine;
	}

	public function getLunghezza(){
		return $this->lunghezza;
	}
	private function setLunghezza(){
		$lunghezza1 = $this->inizio->diff($this->fine);
		$this->lunghezza = $lunghezza1->days;
		
	}

	public function setTipo($ini, $fin){
		$d3 = new DateTime("10-12-2025");
		$d4 = new DateTime("07-01-2026");
		$pa1 = new Periodo($d3, $d4);

		$d5 = new DateTime("01-07-2025");
		$d6 = new DateTime("31-08-2025");
		$pa2 = new Periodo($d3, $d4);
		$list = array($pa1, $pa2);
		$this->setPeriodiAlta($list);
		
		$tipo = "bassa";
		$min = 4; //impostiamo un valore minimo tra l'inizio del periodo di alta stagione e la fine della prenotazione, o la fine del periodo di alta stagione e l'inizio della prenotazione, in modo tale che se la prenotazione occupa pochissimi giorni del periodo di alta, l'utente non sia costretto a pagare l'importo come se stesse in alta stagione
		foreach ($this->periodiAlta as $periodo) {
			if(($ini >= $periodo->getInizio() || $fin <= $periodo->getFine()) && ($fin-$periodo->getInizio)>=$min || ($periodo->getFine()-$ini)>=$min){
				$tipo = "alta";
				break;
			}
		}
		$this->tipo = $tipo;
    }

	public function getTipo(){
		return $this->tipo;
	}

	public function setPeriodiAlta($periodi){
		$this->periodiAlta = $periodi;

	}




}

?>

<?php


class EPeriodo{

	private ?int $idPeriodo;
	private DateTime $inizio;
	private DateTime $fine;
	private $lunghezza;
	private $tipo;

	public function __construct(DateTime $inizio, DateTime $fine){
		$this->idPeriodo = null;
		$this->inizio = $inizio;
		$this->fine = $fine;
		$this->lunghezza = $this->setLunghezza();
		$this->tipo = $this->setTipo($inizio, $fine);	
	}

	public function setIdPeriodo($idPeriodo){
		$this->idPeriodo = $idPeriodo;
	}
	public function getIdPeriodo(){
		return $this->idPeriodo;
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
		return $this->inizio->diff($this->fine)->days;	
	}

	private function setTipo($ini, $fin){
		ConfiguraPeriodi::inizializzaPeriodi(); //permette l'accesso all'array di periodi che si trova nella classe Con
		$periodiA = ConfiguraPeriodi::$list;
		$tipo = "bassa";

		for($i=0; $i<count($periodiA); $i++){
			echo "CICLO " . $i . "<br>";
			if(($ini > $periodiA[$i][0] && $ini < $periodiA[$i][1]) || ($fin > $periodiA[$i][0] && $fin < $periodiA[$i][1])){
				$tipo = "alta";
				break;
			}
		}
		return $tipo;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function getStringPeriodo(){
		$output = $this->inizio->format("d-m-Y") . " - " . $this->fine->format("d-m-Y");
		return $output;
	}
}

?>

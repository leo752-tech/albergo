<?php
require_once "Data.php";
class Calendario{

	//tutte le camere della struttura con il relativo stato
	private $camere = array();

	//elenco di tutte le prenotazioni relative a una data
	private $prenotazioni = array();

	//elenco di tutte le date
	private $date = array();

	public function __construct(){
		$this->date = $this->popolaDate();
		//$this->camere = //Foundation
		//$this->prenotazioni = //Foundation
	}

	public function getDate(){
		return $this->date;
	}
	public function getCamere(){
		return $this->camere;
	}	
	public function getPrenotazioni(){
		return $this->prenotazioni;
	}

    //funzione che genera un numero di date
	private function popolaDate(){
		$lenCalendario = 60;
		$tempDate = array();
		$data = new DateTime();
		for($i=0; $i<$lenCalendario; $i++){
			$dataF = $data->format("d-m-Y");
			$tempDate[] = $dataF;
			$data->modify("+1 day");
		}
		return $tempDate;

	}
}

?>
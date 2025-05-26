<?php 
class Cperiodo{
	public function __construct(){}
	public static function verificaOccupazionePeriodo($occupato, $richiesto){
		$cond1 = $richiesto->getFine() >= $occupato->getInizio() || $richiesto->getInizio() <= $occupato->getFine();
		$cond2 = $richiesto->getInizio() <= $occupato->getInizio() && $richiesto->getFine() >= $occupato->getFine(); 
		if($cond1 || $cond2){return true;}
		else{return false;}
	}

	
}

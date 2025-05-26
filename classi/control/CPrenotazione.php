<?php

class CPrenotazione{
	
	public function __construct(){}

	public static function verificaCamereDisponibili($periodoRichiesto, $posti){
		$periodoRichiestoB = new EPeriodo(UHTTPpost("inizio"), UHTTPpost("fine"));
		$camereDisponibili = array();
		$camere = FCamera::getCamerePosti($posti);
		if(count($camere>0)){
			foreach ($camere as $camera){
				$idOccupazioni = $camera->getIdOccupazioni();
				foreach ($idOccupazioni as $id) {
					$periodoOccupato = FPersistentManager::getInstance()->getOggetto("EPeriodo", $id);
					$result = CPeriodo::verificaOccupazionePeriodo($periodoOccupato, $periodoRichiesto);
					if(!$result){
						$camereDisponibili[] = $camera;
					}
				}
			}
			return $camereDisponibili;
		}else{
			return null;
		}
	}



}

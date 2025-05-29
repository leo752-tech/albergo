<?php 

class CPeriod {
    
	public function __construct() {}
// 1. L'inizio del richiesto è prima o uguale alla fine dell'occupato e La fine del richiesto è dopo o uguale all'inizio dell'occupato.    
        // Questa condizione copre tutti i casi di sovrapposizione.
    public static function checkPeriodOverlap($occupiedStart, $occupiedEnd, $requestedStart, $requestedEnd) {
        return $requestedStart <= $occupiedEnd && $requestedEnd >= $occupiedStart;
    }
}
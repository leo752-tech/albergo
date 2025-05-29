<?php

class CBooking {

    public function __construct() {}

    public static function getAvailableRooms($requestedPeriodStart, $requestedPeriodEnd) {
        $availableRooms = [];

        $allRooms = FRoom::getAllRooms();
        if (empty($allRooms)) {
            return []; // Nessuna camera registrata nel sistema
        }
		//verifica se è disponibile per il periodo richiesto.
        foreach ($allRooms as $room) {
            $isRoomOccupied = false;

            $bookings = $room->getBookings();

            foreach ($bookings as $booking) {
                $occupiedStart = $booking->getStart();
                $occupiedEnd = $booking->getEnd();
				// Se c'è una qualsiasi sovrapposizione, la camera è occupata per il periodo.
                if (CPeriod::checkPeriodOverlap($occupiedStart, $occupiedEnd, $requestedPeriodStart, $requestedPeriodEnd)) {
                    $isRoomOccupied = true;
                    break; // Non serve controllare le altre prenotazioni di questa camera
                }
            }
            // Se, dopo aver controllato tutte le sue prenotazioni, la camera non risulta occupata,
            // allora è disponibile e la aggiungiamo all'elenco.
            if (!$isRoomOccupied) {
                $availableRooms[] = $room;
            }
        }

        return $availableRooms;
    }
}
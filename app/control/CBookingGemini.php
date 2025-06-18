<?php

class CBookingGemini {

    public function __construct() {}

    public static function getAvailableRooms() {
        echo 'GEEEEEEMMMMMMMMMMIIIIIIIIIINNNNNNNNNIIIIIIIIIII' . '<br>';
        $requestedCheckIn = UHTTP::post('data_check_in');
        $requestedCheckOut = UHTTP::post('data_check_out');
        $requestedBeds = UHTTP::post('num_adulti');

        $availableRooms = array();
        
        // 1. Recupera tutte le stanze con il numero di letti richiesto
        $rooms = FPersistentManager::getInstance()->getRoomsByBeds($requestedBeds);

        // Se non ci sono stanze con quel numero di letti, restituisci un messaggio
        if (empty($rooms)) { // Usiamo empty() per verificare se l'array è vuoto
            echo "THERE IS NO ROOM WITH BEDS SELECTED";
            return $availableRooms; // Restituisce un array vuoto
        }

        // 2. Itera su ogni stanza trovata
        foreach ($rooms as $room) {
            $isRoomCurrentlyAvailable = true; // Assumiamo che la stanza sia disponibile finché non troviamo una prenotazione che la occupi

            // Recupera tutte le prenotazioni per la stanza corrente
            // Supponiamo che getBookingsByRoom restituisca un array (anche vuoto) o null
            $bookingsForThisRoom = FPersistentManager::getInstance()->getBookingsByRoom($room->getId());

            // Se ci sono prenotazioni per questa stanza, controlliamo le sovrapposizioni
            if (!empty($bookingsForThisRoom)) { // Usiamo empty() per verificare se l'array è vuoto
                foreach ($bookingsForThisRoom as $book) {
                    // Assicurati che $book sia un array associativo con le chiavi corrette o un oggetto con le proprietà
                    // Se $book è un oggetto Booking, userai $book->getCheckInDate()
                    // Se $book è un array, userai $book['checkInDate']
                    $occupiedCheckIn  = $book["checkInDate"];
                    $occupiedCheckOut = $book["checkOutDate"];

                    // Verifica se la richiesta si sovrappone a una prenotazione esistente
                    if (!self::isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut)) {
                        // Se c'è una sovrapposizione, la stanza NON è disponibile per le date richieste
                        $isRoomCurrentlyAvailable = false;
                        // echo "THIS PERIOD IS ALREADY OCCUPIED for room " . $room->getId() . "\n"; // Solo per debug
                        break; // Non c'è bisogno di controllare le altre prenotazioni per questa stanza
                    }
                }
            }
            // ELSE: Se non ci sono prenotazioni per questa stanza (bookingsForThisRoom è vuoto),
            // la stanza rimane disponibile (isRoomCurrentlyAvailable rimane true)

            // Se la stanza è ancora disponibile dopo aver controllato tutte le sue prenotazioni
            if ($isRoomCurrentlyAvailable) {
                $availableRooms[] = $room; // Aggiungi la stanza all'elenco delle disponibili
            }
        }

        // 3. Dopo aver controllato tutte le stanze, restituisci il risultato
        if (empty($availableRooms)) {
            echo "NESSUNA CAMERA DISPONIBILE PER LE DATE SELEZIONATE";
        }
        print_r($availableRooms);
        return $availableRooms; // Restituisce sempre un array (vuoto o con le stanze disponibili)
    }

    public static function isAvailableRoom($requestedCheckIn, $requestedCheckOut, $occupiedCheckIn, $occupiedCheckOut){
        // Converto le stringhe data in oggetti DateTime per confronti precisi
        // Assicurati che le date siano nel formato corretto per DateTime
        $reqIn = new DateTime($requestedCheckIn);
        $reqOut = new DateTime($requestedCheckOut);
        $occIn = new DateTime($occupiedCheckIn);
        $occOut = new DateTime($occupiedCheckOut);

        // La logica più semplice per la sovrapposizione:
        // Due intervalli si sovrappongono se:
        // L'inizio della richiesta è PRIMA della fine dell'occupato E
        // La fine della richiesta è DOPO l'inizio dell'occupato.
        // NOTA: Se vuoi includere il giorno di check-out come libero, la logica cambia leggermente.
        // Molti hotel considerano il check-out come il giorno in cui la stanza si libera.
        // La tua logica attuale include il check-out nel periodo occupato.

        // Condizione di sovrapposizione:
        // Se la fine della prenotazione richiesta è maggiore o uguale all'inizio della prenotazione esistente
        // E l'inizio della prenotazione richiesta è minore o uguale alla fine della prenotazione esistente
        $overlaps = ($reqOut >= $occIn && $reqIn <= $occOut);

        // Se $overlaps è true, significa che NON è disponibile, quindi ritorniamo false
        // Se $overlaps è false, significa che è disponibile, quindi ritorniamo true
        // echo "BOOL: " . (!$overlaps ? 'true' : 'false') . "\n"; // Debug
        return !$overlaps;
    }

    public static function makeBooking(){
        // Implementazione per la creazione della prenotazione
    }
}
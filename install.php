<?php
require_once __DIR__ . '/app/config/config.php'; 

require_once __DIR__ . '/install/installation.php'; 

echo "Tentativo di installazione/verifica del database MyHotel...<br>";

if (Installation::install()) {
    echo "Operazione completata con successo! Il database è pronto.";
} else {
    echo "Si è verificato un errore durante l'installazione del database. Controlla i messaggi sopra e i log del server per i dettagli.";
}
?>
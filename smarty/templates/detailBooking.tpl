<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Giorno</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/detailBooking.css">
</head>
<body>
    <div class="content-container">
        <h1 id="pageTitle"></h1>
        <div id="dayDetails">
            {* Qui Smarty si occuperà di iterare sui dati delle prenotazioni *}
            {if isset($bookings) && count($bookings) > 0}
                <p>Informazioni per il giorno **{$readableDate|default:'Data sconosciuta'}**:</p>
                <h3>Prenotazioni del giorno:</h3>
                <ul class="booking-list">
                    {foreach $bookings as $booking}
                        <li class="booking-item">
                            <p><strong>ID Prenotazione:</strong> {$booking->getId()|default:'N/A'} 
                                {if $booking->getCancellation()}
                                    <span class="cancelled-booking">(CANCELLATA)</span>
                                {/if}
                            </p>
                            <p><strong>Utente (ID):</strong> {$booking->getIdRegisteredUser()|default:'N/A'}</p>
                            <p><strong>Camera (ID):</strong> {$booking->getIdRoom()|default:'N/A'}</p>
                            <p><strong>Check-in:</strong> {$booking->getCheckInDate()->format('d/m/Y')|default:'N/A'}</p>
                            <p><strong>Check-out:</strong> {$booking->getCheckOutDate()->format('d/m/Y')|default:'N/A'}</p>
                            <p><strong>Prezzo Totale:</strong> €{$booking->getTotalPrice()|number_format:2:',':'.'}</p>
                            <p><strong>Data Prenotazione:</strong> {$booking->getBookingDate()->format('d/m/Y H:i')|default:'N/A'}</p>
                            {if $booking->getIdSpecialOffer()}
                                <p><strong>Offerta Speciale (ID):</strong> {$booking->getIdSpecialOffer()}</p>
                            {/if}
                        </li>
                    {/foreach}
                </ul>
            {else}
                <p>Nessuna prenotazione registrata per il giorno **{$readableDate|default:'Data sconosciuta'}**.</p>
            {/if}
        </div>
    </div>
    <a href="/albergoPulito/public/Admin/manageBookings" class="back-link">Torna al Calendario</a>

    <script src="/albergoPulito/public/assets/js/detailBooking.js" defer></script>

</body>
</html>
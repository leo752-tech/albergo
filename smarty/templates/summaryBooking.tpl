{include file='header.tpl'}

<section class="section-padding booking-summary-page">
    <div class="container">
        <div class="booking-summary-card card">
            <h1 class="card-title text-center mb-4">Riepilogo della tua Prenotazione</h1>

            {if isset($booking) && $booking instanceof EBooking}
                <div class="summary-details">
                    <div class="detail-item">
                        <strong>ID Prenotazione:</strong> 
                        <span>{$booking->getId()}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Data di Prenotazione:</strong> 
                        <span>{$booking->getBookingDate()->format('d/m/Y H:i')}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Check-in:</strong> 
                        <span>{$booking->getCheckInDate()->format('d/m/Y')}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Check-out:</strong> 
                        <span>{$booking->getCheckOutDate()->format('d/m/Y')}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Numero di Notti:</strong>
                        {* Calcola la differenza in giorni tra check-out e check-in *}
                        <span>
                            {$checkInTimestamp = $booking->getCheckInDate()->getTimestamp()}
                            {$checkOutTimestamp = $booking->getCheckOutDate()->getTimestamp()}
                            {$diffSeconds = $checkOutTimestamp - $checkInTimestamp}
                            {$numNights = ceil($diffSeconds / (60 * 60 * 24))}
                            {$numNights}
                        </span>
                    </div>

                    {* Dettagli della Camera Selezionata *}
                    {if isset($room) && $room instanceof ERoom}
                        <h3 class="mt-4 mb-3">Dettagli Camera</h3>
                        <div class="detail-item">
                            <strong>Camera:</strong> 
                            <span>{$room->getName()|escape:'html'} (ID: {$room->getId()})</span>
                        </div>
                        <div class="detail-item">
                            <strong>Tipo Camera:</strong> 
                            <span>{$room->getType()|escape:'html'}</span>
                        </div>
                        <div class="detail-item">
                            <strong>Posti Letto:</strong> 
                            <span>{$room->getBeds()}</span>
                        </div>
                        <div class="detail-item">
                            <strong>Prezzo per Notte (Camera):</strong> 
                            <span>€{$room->getPrice()|number_format:2:',':'.'}</span>
                        </div>
                    {else}
                        <div class="detail-item alert alert-warning mt-4">
                            <strong>Camera:</strong> <span>Dettagli della camera non disponibili. (ID Camera: {$booking->getIdRoom()})</span>
                        </div>
                    {/if}

                    {* Dettagli Servizi Extra Selezionati *}
                    {if !empty($selectedExtraServices)}
                        <h3 class="mt-4 mb-3">Servizi Extra Selezionati</h3>
                        <ul class="list-group list-group-flush services-summary-list">
                            {foreach $selectedExtraServices as $service}
                                {if $service instanceof EExtraService}
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{$service->getName()|escape:'html'}</span>
                                        <span class="badge bg-primary rounded-pill">€{$service->getPrice()|number_format:2:',':'.'}</span>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    {else}
                        <h3 class="mt-4 mb-3">Servizi Extra</h3>
                        <div class="detail-item">
                            <span>Nessun servizio extra selezionato.</span>
                        </div>
                    {/if}

                    {* Dettagli offerta speciale, se presente *}
                    {if $booking->getIdSpecialOffer() !== null && isset($specialOffer) && $specialOffer instanceof ESpecialOffer}
                        <div class="detail-item highlighted mt-4">
                            <strong>Offerta Speciale:</strong> 
                            <span>{$specialOffer->getName()|escape:'html'}</span>
                            <p class="service-description">{$specialOffer->getDescription()|escape:'html'}</p>
                        </div>
                    {elseif $booking->getIdSpecialOffer() !== null}
                         <div class="detail-item mt-4">
                            <strong>Offerta Speciale ID:</strong> 
                            <span>{$booking->getIdSpecialOffer()} (Dettagli non disponibili)</span>
                        </div>
                    {/if}

                    <div class="detail-item total-price mt-4">
                        <strong>Prezzo Totale:</strong> 
                        <span class="price">€{$booking->getTotalPrice()|number_format:2:',':'.'}</span>
                    </div>

                    {if $booking->getCancellation()}
                        <div class="alert alert-warning text-center mt-3">
                            Questa prenotazione è stata **cancellata**.
                        </div>
                    {/if}
                </div>

                <div class="booking-actions text-center mt-5">
                    {* Esempio di pulsanti: Torna alla home, Visualizza le mie prenotazioni *}
                    <a href="/albergoPulito/public/home" class="btn btn-secondary">Torna alla Home</a>
                    <a href="/albergoPulito/public/Booking/showPayment/{$booking->getId()}/{$booking->getTotalPrice()}" class="btn btn-primary">Prenota</a>
                </div>
            {else}
                <div class="alert alert-danger text-center">
                    Spiacenti, non è stato possibile caricare i dettagli della prenotazione.
                </div>
            {/if}
        </div>
    </div>
</section>

{include file='footer.tpl'}
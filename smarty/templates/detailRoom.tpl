{include file='header.tpl'}
    <section class="section-padding room-detail-page">
        <div class="container">
            <div class="room-detail-card card">
                <h1 class="card-title">
                    {* Controlla se $room è un'istanza valida prima di chiamare getName() *}
                    {if isset($room) && $room instanceof ERoom}
                        {$room->getName()|escape}
                    {else}
                        Dettagli Camera
                    {/if}
                </h1>

                <div class="room-gallery">
                    {if !empty($images)}
                        <div class="main-image-container">
                            <img src="{$images[0]->getFilePath()|default:'images/placeholder.jpg'}" 
                                 alt="Immagine principale di {if isset($room) && $room instanceof ERoom}{$room->getName()|escape:'html'}{else}Camera{/if}" 
                                 class="img-fluid main-room-image">
                        </div>
                        {if count($images) > 1}
                            <div class="thumbnail-gallery">
                                {foreach $images as $index => $image}
                                    {* Usa getFilePath() per le miniature e getName() per l'alt text. Aggiunto controllo per EImage *}
                                    <img src="{$image->getFilePath()}" 
                                         alt="Immagine {$index+1} di {if isset($image) && $image instanceof EImage}{$image->getName()|escape:'html'}{else}Immagine{/if}" 
                                         data-full-src="{$image->getFilePath()}" 
                                         class="img-fluid thumbnail-image">
                                {/foreach}
                            </div>
                        {/if}
                    {else}
                        <div class="main-image-container">
                            <img src="albergoPulito/public/assets/img/camera1.jpg" 
                                 alt="Nessuna immagine disponibile per {if isset($room) && $room instanceof ERoom}{$room->getName()|escape:'html'}{else}questa camera{/if}" 
                                 class="img-fluid main-room-image">
                        </div>
                    {/if}
                </div>

                <div class="room-info">
                    <div class="detail-item">
                        <strong>Tipo:</strong> 
                        <span>{if isset($room) && $room instanceof ERoom}{$room->getType()|escape:'html'}{else}N/D{/if}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Posti Letto:</strong> 
                        <span>{if isset($room) && $room instanceof ERoom}{$room->getBeds()}{else}N/D{/if}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Prezzo per Notte:</strong> 
                        <span class="room-price">€{if isset($room) && $room instanceof ERoom}{$room->getPrice()|number_format:2:',':'.'}{else}N/D{/if}</span>
                    </div>
                    <div class="detail-item full-width">
                        <strong>Descrizione:</strong>
                        <p>{if isset($room) && $room instanceof ERoom}{$room->getDescription()|escape:'html'}{else}Nessuna descrizione disponibile.{/if}</p>
                    </div>

                    {* Inizio Form per la selezione dei servizi e prenotazione *}
                    <form id="bookingForm" action="/albergoPulito/public/Booking/showSummary/{$room->getId()}" method="post">
                        {* Campo nascosto per l'ID della stanza *}
                        {if isset($room) && $room instanceof ERoom}
                            <input type="hidden" name="roomId" value="{$room->getId()}">
                        {else}
                            <input type="hidden" name="roomId" value="0">
                        {/if}

                        {* Nuova sezione per i servizi extra *}
                        {if !empty($extraServices)}
                            <div class="detail-item full-width mt-4">
                                <strong>Servizi Extra Disponibili:</strong>
                                <div class="extra-services-list">
                                    {foreach $extraServices as $service}
                                        {if $service instanceof EExtraService}
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" 
                                                       name="selectedServices[]" id="service_{$service->getId()}" value="{$service->getId()}">
                                                <label class="form-check-label" for="service_{$service->getId()}">
                                                    {$service->getName()|escape:'html'} (€{$service->getPrice()|number_format:2:',':'.'})
                                                    <p class="service-description">{$service->getDescription()|escape:'html'}</p>
                                                </label>
                                            </div>
                                        {/if}
                                    {/foreach}
                                </div>
                            </div>
                        {else}
                            <div class="detail-item full-width mt-4">
                                <strong>Servizi Extra:</strong>
                                <span>Nessun servizio extra disponibile.</span>
                            </div>
                        {/if}
                        
                        {* Questo campo sarà aggiornato da te tramite JavaScript/AJAX se vuoi un prezzo dinamico,
                           ma non sarà inviato direttamente per il routing dell'URL *}
                        <div class="detail-item total-summary mt-3">
                            <strong>Prezzo Stimato (solo camera):</strong>
                            <span class="room-price">
                                €{if isset($room) && $room instanceof ERoom}{$room->getPrice()|number_format:2:',':'.'}{else}0,00{/if}
                            </span>
                        </div>

                        <div class="room-actions">
                            <button type="submit" class="btn btn-primary">Procedi con la Prenotazione</button>
                            <a href="/albergoPulito/public/Booking/getAvailableRooms/1" class="btn btn-secondary">Torna alle Camere</a>
                        </div>
                    </form>
                    {* Fine Form *}

                </div>
            </div>
        </div>
    </section>
{include file='footer.tpl'}
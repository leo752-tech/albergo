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

                    
                </div>
            </div>
        </div>
    </section>
{include file='footer.tpl'}
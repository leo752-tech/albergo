{include file='header.tpl'}
    <section class="section-padding room-detail-page">
        <div class="container">
            <div class="room-detail-card card">
                <h1 class="card-title">{$room->getName()|escape}</h1>

                <div class="room-gallery">
                    {if !empty($images)}
                        <div class="main-image">
                            <img src="{$images[0]->getFilePath()|default:'images/placeholder.jpg'}" alt="Immagine principale di {$room->getName()|escape:'html'}">
                        </div>
                        {if count($images) > 1}
                            <div class="thumbnail-gallery">
                                {foreach $images as $index => $image}
                                    {* Usa getFilePath() per le miniature e getName() per l'alt text *}
                                    <img src="{$image->getFilePath()}" alt="Immagine {$index+1} di {$image->getName()|escape:'html'}" data-full-src="{$image->getFilePath()}">
                                {/foreach}
                            </div>
                        {/if}
                    {else}
                        <div class="main-image">
                            <img src="albergoPulito/public/assets/img/camera1.jpg" alt="Nessuna immagine disponibile per {$room->getName()|escape:'html'}">
                        </div>
                    {/if}
                </div>

                <div class="room-info">
                    <div class="detail-item">
                        <strong>Tipo:</strong> <span>{$room->getType()|escape:'html'}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Posti Letto:</strong> <span>{$room->getBeds()}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Prezzo per Notte:</strong> <span class="room-price">€{$room->getPrice()|number_format:2:',':'.'}</span>
                    </div>
                    <div class="detail-item full-width">
                        <strong>Descrizione:</strong>
                        <p>{$room->getDescription()|escape:'html'}</p>
                    </div>
                </div>

                <div class="room-actions">
                    <a href="{$base_url}/prenota/{$room->getId()}" class="btn btn-primary">Prenota Ora</a>
                    <a href="albergoPulito/public/Booking/showAvailableRooms" class="btn btn-secondary">Torna alle Camere</a>
                </div>
            </div>
        </div>
    </section>
{include file='footer.tpl'}
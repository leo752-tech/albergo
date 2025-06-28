{include file='header.tpl'  pageTitle='show offer'}
        <section class="section-padding">
            <div class="container">
                <h2 style="text-align: center; margin-bottom: 40px; color: #007bff;">Le Nostre Offerte Speciali</h2>

                {if !empty($specialOffer)}
                    <div class="rooms-grid">
                        {* Inizia il ciclo per ogni oggetto $offerta di tipo ESpecialOffer *}
                        {foreach $specialOffer as $offerta}
                            <div class="room-card special-offer-card">
                                {if !empty($offerta->getPathImage())}
                                    <img src="{$offerta->getPathImage()}" alt="{$offerta->getTitle()}">
                                {else}
                                    <img src="/path/to/default_offer_image.jpg" alt="Immagine offerta non disponibile">
                                {/if}
                                <h4>{$offerta->getTitle()}</h4>
                                <p>{$offerta->getDescription()}</p>
                                <div class="offer-details">
                                    <p>Durata Soggiorno: <strong>{$offerta->getLength()} notti</strong></p>
                                </div>
                                <div class="room-price">
                                    Prezzo Speciale: <span class="offer-price">€{$offerta->getSpecialPrice()|string_format:"%.2f"}</span>
                                </div>
                                <a href="/albergoPulito/public/Booking/selectDate/{$offerta->getIdSpecialOffer()}" class="btn btn-primary">Prenota Ora</a>
                            </div>
                        {/foreach}
                    </div>
                {else}
                    <div class="alert alert-warning" style="text-align: center;">
                        <p>Al momento non ci sono offerte speciali disponibili. Torna a trovarci presto!</p>
                        <a href="/" class="btn btn-primary">Torna alla Home</a>
                    </div>
                {/if}
            </div>
        </section>
{include file='footer.tpl'}
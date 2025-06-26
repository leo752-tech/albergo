{include file='header.tpl' pageTitle='Gestione Offerte Speciali'}

<section class="container section-padding">
    <h2 class="text-center mb-4">Gestione Offerte Speciali</h2>

    <div class="admin-actions mb-4 text-center">
        <a href="/albergoPulito/public/Admin/addSpecialOffer" class="btn btn-success">Aggiungi Nuova Offerta</a>
    </div>

    <div class="offers-grid">
        {foreach from=$specialOffers item=offer}
            <div class="offer-card admin-offer">
                <img src="/albergoPulito/public/assets/img/offerte/{$offer.imageNew}" alt="Immagine offerta {$offer.title}" class="offer-image">
                <div class="offer-details">
                    <h3>{$offer.title}</h3>
                    <p>{$offer.description}</p>
                    <ul>
                        <li><strong>Permanenza minima:</strong> {$offer.length} notte{if $offer.length > 1}s{/if}</li>
                        <li><strong>Prezzo speciale:</strong> {$offer.specialPrice}€</li>
                    </ul>

                    <div class="admin-buttons">
                        <a href="/albergoPulito/public/Admin/editSpecialOffer/{$offer.idSpecialOffer}" class="btn btn-warning">Modifica</a>
                        <a href="/albergoPulito/public/Admin/deleteSpecialOffer/{$offer.idSpecialOffer}" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa offerta?');">Elimina</a>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</section>

{include file='footer.tpl'}


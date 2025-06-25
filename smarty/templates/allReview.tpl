{include file='header.tpl'}

<h2>Tutte le Recensioni dei Clienti</h2>

{if !empty($allReviews)}
    {foreach $allReviews as $review}
        <div class="review-card">
            <div class="review-header">
                <h3>{$review[0]->getTitle()}</h3>
                <span class="review-date">{$review[0]->getDate()->format('d/m/Y H:i')}</span>
            </div>
            <div class="review-meta">
                {* Assumiamo che $review->getUserFullName() restituisca il nome completo dell'utente *}
                <p>Lasciata da: <strong>{$review[1]|default:'Utente Sconosciuto'}</strong></p>
                <div class="rating-display">
                    Valutazione: {$review[0]->getRating()} / 5
                    {* Puoi usare icone a stella qui, se hai un set di icone o Font Awesome *}
                    {*
                    {for $i = 1 to 5}
                        {if $i <= $review[0]->getRating()}
                            <span class="star filled">&#9733;</span>
                        {else}
                            <span class="star empty">&#9734;</span>
                        {/if}
                    {/for}
                    *}
                </div>
            </div>
            <div class="review-description">
                <p>{$review[0]->getDescription()}</p>
            </div>
        </div>
    {/foreach}
{else}
    <p>Non ci sono ancora recensioni disponibili.</p>
{/if}

{include file='footer.tpl'}

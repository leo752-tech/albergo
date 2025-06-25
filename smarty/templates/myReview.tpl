{include file='header.tpl'}

{if !empty($reviews)}
    {foreach $reviews as $review}
        <div class="review-card">
            <div class="review-header">
                <h3>{$review->getTitle()}</h3>
                <span class="review-date">{$review->getDate()->format('d/m/Y')}</span>
            </div>
            <div class="review-rating">
                {* Puoi usare icone a stella o un semplice numero *}
                Valutazione: {$review->getRating()} / 5
                {* Esempio con stelle (richiede CSS o font-awesome) *}
                {*
                {for $i = 1 to 5}
                    {if $i <= $review->getRating()}
                        <span class="star filled">&#9733;</span>
                    {else}
                        <span class="star empty">&#9734;</span> 
                    {/if}
                {/for}
                *}
            </div>
            <div class="review-description">
                <p>{$review->getDescription()}</p>
            </div>
            <div class="review-actions">
                {* Queste azioni porterebbero a pagine di modifica o eliminazione gestite dal controller *}
                <a href="/albergoPulito/public/User/deleteReview" class="btn btn-delete" onclick="return confirm('Sei sicuro di voler eliminare questa recensione?');">Elimina</a>
            </div>
        </div>
    {/foreach}
{else}
    <p>Non hai ancora lasciato alcuna recensione.</p>
{/if}

<div class="create-review-section">
    <a href="/albergoPulito/public/User/showSetReview" class="btn btn-primary">Scrivi una Nuova Recensione</a>
</div>

{include file='footer.tpl'}


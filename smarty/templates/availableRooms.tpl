


{include file='header.tpl' pageTitle='Le Nostre Camere'}

<section id="rooms-overview" class="container section-padding">
    <h2>Trova la Camera Perfetta</h2>


    {* FORM DI RICERCA CAMERE *}
    

    {* LISTA DELLE CAMERE DISPONIBILI *}
    <h3>Camere Disponibili </h3>

    {if !empty($rooms)}
        <div class="rooms-grid">

            {foreach $rooms as $room}
                <div class="room-card">
                    {if !empty($room[1])}
                    
                        <img src="{$room[1][0]->getFilePath()}" alt="{$room[1][0]->getName()|escape:'html'}" class="img-fluid">
                    {else}
                        <img src="/albergoPulito/public/images/camera1.jpg" alt="Immagine di placeholder" class="img-fluid">
                    {/if}
                    <h4>{$room[0]->getName()|default:'Nome Camera'}</h4>
                    <p class="room-type"><i class="fas fa-info-circle"></i> Tipo: {$room[0]->getType()|default:'N/A'}</p>
                    <p class="room-beds"><i class="fas fa-bed"></i> Posti Letto: {$room[0]->getBeds()|default:'N/A'}</p>
                    <p class="room-description">{$room[0]->getDescription()|truncate:100:"..."|default:'Nessuna descrizione disponibile.'}</p>
                    <div class="room-price">Prezzo: <strong>{$room[0]->getPrice()|string_format:"%.2f"|default:'N/A'} €</strong> / notte</div>
                    
                  
                  
                    <a href="/albergoPulito/public/Booking/showDetailRoom/{$room[0]->getId()}" class="btn btn-success btn-block mt-3">Prenota Ora</a>
                    
                </div>
            {/foreach}
        </div>
    {else}
        <div class="alert alert-warning" role="alert">
            Al momento non ci sono camere disponibili che corrispondono ai tuoi criteri di ricerca. Prova a modificare le date o il numero di ospiti.
        </div>
    {/if}
</section>

{include file='footer.tpl'}



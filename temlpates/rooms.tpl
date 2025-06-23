

{include file='header.tpl' pageTitle='Le Nostre Camere'}

<section id="rooms-overview" class="container section-padding">
    <h2>Trova la Camera Perfetta</h2>

    {if $errorMessage}
        <div class="alert alert-danger" role="alert">
            {$errorMessage}
        </div>
    {/if}
    {if $successMessage}
        <div class="alert alert-success" role="alert">
            {$successMessage}
        </div>
    {/if}

    {* FORM DI RICERCA CAMERE *}
    <div class="room-search-form card mb-5">
        <div class="card-body">
            <h3>Cerca Disponibilità</h3>
            <form action="{$base_url}rooms.php" method="GET">
                <div class="form-grid-search">
                    <div class="form-group">
                        <label for="check_in_date">Check-in:</label>
                        <input type="date" class="form-control" id="check_in_date" name="check_in_date" 
                               value="{$searchData.check_in_date|default:''}" required>
                    </div>
                    <div class="form-group">
                        <label for="check_out_date">Check-out:</label>
                        <input type="date" class="form-control" id="check_out_date" name="check_out_date" 
                               value="{$searchData.check_out_date|default:''}" required>
                    </div>
                    <div class="form-group">
                        <label for="beds">Ospiti:</label>
                        <input type="number" class="form-control" id="beds" name="beds" 
                               value="{$searchData.beds|default:'1'}" min="1" required>
                    </div>
                    <div class="form-group form-group-button">
                        <button type="submit" class="btn btn-primary btn-block">Cerca Camere</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {* LISTA DELLE CAMERE DISPONIBILI *}
    <h3>Camere Disponibili {if $searchData.check_in_date && $searchData.check_out_date}(dal {$searchData.check_in_date|date_format:"%d/%m/%Y"} al {$searchData.check_out_date|date_format:"%d/%m/%Y"}) {/if}</h3>

    {if !empty($rooms)}
        <div class="rooms-grid">

            {foreach $rooms as $room}
                <div class="room-card">
                    {if !empty($room->getImages())}
                    
                        <img src="{$base_url}{$room->getImages()[0]|default:'public/images/placeholder_room.jpg'}" alt="Immagine di {$room->getName()|default:'Camera'}" class="img-fluid">
                    {else}
                        <img src="{$base_url}public/images/placeholder_room.jpg" alt="Immagine di placeholder" class="img-fluid">
                    {/if}
                    <h4>{$room->getName()|default:'Nome Camera'}</h4>
                    <p class="room-type"><i class="fas fa-info-circle"></i> Tipo: {$room->getType()|default:'N/A'}</p>
                    <p class="room-beds"><i class="fas fa-bed"></i> Posti Letto: {$room->getBeds()|default:'N/A'}</p>
                    <p class="room-description">{$room->getDescription()|truncate:100:"..."|default:'Nessuna descrizione disponibile.'}</p>
                    <div class="room-price">Prezzo: <strong>{$room->getPrice()|string_format:"%.2f"|default:'N/A'} €</strong> / notte</div>
                    
                  
                    {if $searchData.check_in_date && $searchData.check_out_date}
                  
                        <a href="{$base_url}booking.php?room_id={$room->getIdCamera()|default:$room.idCamera}&check_in={$searchData.check_in_date}&check_out={$searchData.check_out_date}" class="btn btn-success btn-block mt-3">Prenota Ora</a>
                    {else}
                      
                        <a href="{$base_url}room_details.php?id={$room->getIdCamera()|default:$room.idCamera}" class="btn btn-info btn-block mt-3">Dettagli Camera</a>
                    {/if}
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

{* Aggiungi questi stili al tuo public/css/style.css per una migliore visualizzazione *}
<style>
    .room-search-form.card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        padding: 25px;
    }
    .form-grid-search {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        align-items: end; /* Allinea i bottoni in basso */
    }
    .form-group-button {
        display: flex;
        align-items: center; /* Centra il bottone verticalmente */
        height: 100%; /* Occupa l'altezza completa del grid item */
    }

    .rooms-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    .room-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        text-align: center;
        padding-bottom: 20px; /* Spazio per il bottone */
        display: flex; /* Flexbox per allineare contenuto */
        flex-direction: column; /* Colonna per i contenuti */
        justify-content: space-between; /* Spinge il bottone in basso */
    }
    .room-card img {
        width: 100%;
        height: 200px; /* Altezza fissa per le immagini */
        object-fit: cover; /* Assicura che l'immagine copra l'area senza distorcersi */
        border-bottom: 1px solid #eee;
        margin-bottom: 15px;
    }
    .room-card h4 {
        font-size: 1.6rem;
        color: #333;
        margin-bottom: 10px;
        padding: 0 15px;
    }
    .room-card p {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 8px;
        padding: 0 15px;
    }
    .room-card .room-price {
        font-size: 1.2rem;
        color: #007bff;
        margin-top: 15px;
        font-weight: bold;
        padding: 0 15px;
    }
    .room-card .btn {
        margin-top: auto; /* Spinge il bottone in fondo al card */
        margin-left: 15px;
        margin-right: 15px;
    }
</style>
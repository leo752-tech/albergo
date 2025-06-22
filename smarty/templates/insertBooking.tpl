


{include file='header_admin.tpl'}

<div class="container">
    <h2>Aggiungi Nuova Prenotazione</h2>

   

    <div class="form-grid">
        <form action="/~momok/Admin/insertBooking" method="POST">
            <div class="form-group">
                <label for="idUser">Utente:</label>
                {* Presuppone che $usersList sia un array di utenti (ID, Nome Cognome) per popolare la select *}
                <select class="form-control" id="idUser" name="idUser" required>
                    <option value="">Seleziona un utente</option>
                    {if !empty($usersList)}
                        {foreach $usersList as $user}
                            <option value="{$user->getIdUser()|default:$user.idUser}" {if $formData.idUser eq ($user->getIdUser()|default:$user.idUser)}selected{/if}>
                                {$user->getFirstName()|default:$user.firstName} {$user->getLastName()|default:$user.lastName} (ID: {$user->getIdUser()|default:$user.idUser})
                            </option>
                        {/foreach}
                    {/if}
                </select>
            </div>

            <div class="form-group">
                <label for="idRoom">Camera:</label>
                {* Presuppone che $roomsList sia un array di camere (ID, Nome Camera) per popolare la select *}
                <select class="form-control" id="idRoom" name="idRoom" required>
                    <option value="">Seleziona una camera</option>
                    {if !empty($roomsList)}
                        {foreach $roomsList as $room}
                            <option value="{$room->getIdCamera()|default:$room.idCamera}" {if $formData.idRoom eq ($room->getIdCamera()|default:$room.idCamera)}selected{/if}>
                                {$room->getName()|default:$room.name} (ID: {$room->getIdCamera()|default:$room.idCamera}, Posti: {$room->getBeds()|default:$room.beds})
                            </option>
                        {/foreach}
                    {/if}
                </select>
            </div>

            <div class="form-group">
                <label for="checkInDate">Data Check-in:</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="{$formData.checkInDate|default:''}" required>
            </div>

            <div class="form-group">
                <label for="checkOutDate">Data Check-out:</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="{$formData.checkOutDate|default:''}" required>
            </div>
            
            <div class="form-group">
                <label for="idSpecialOffer">Offerta Speciale (Opzionale):</label>
                {* Presuppone che $offersList sia un array di offerte speciali per popolare la select *}
                <select class="form-control" id="idSpecialOffer" name="idSpecialOffer">
                    <option value="">Nessuna Offerta</option>
                    {if !empty($offersList)}
                        {foreach $offersList as $offer}
                            <option value="{$offer->getIdOffer()|default:$offer.idOffer}" {if $formData.idSpecialOffer eq ($offer->getIdOffer()|default:$offer.idOffer)}selected{/if}>
                                {$offer->getName()|default:$offer.name} ({$offer->getDiscount()|default:$offer.discount}% di sconto)
                            </option>
                        {/foreach}
                    {/if}
                </select>
            </div>

            {* Il prezzo totale verrà calcolato nel PHP, non inserito direttamente dall'admin qui *}
            
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Prenotazione</button>
                <a href="{$base_url}admin/bookings.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}

{include file='header_admin.tpl'}

<div class="container">
    <h2>Aggiungi Nuova Prenotazione</h2>

    <div class="form-grid">
        <form action="/albergoPulito/public/Admin/insertBooking" method="POST">
            <div class="form-group">
                <label for="idUser">Utente:</label>
                <select class="form-control" id="idUser" name="idUser" required>
                    <option value="">Seleziona un utente</option>
                    {foreach from=$usersList item=user}
                        <option value="{$user->getIdUser()}">
                            {$user->getFirstName()} {$user->getLastName()} (ID: {$user->getIdUser()})
                        </option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label for="idRoom">Camera:</label>
                <select class="form-control" id="idRoom" name="idRoom" required>
                    <option value="">Seleziona una camera</option>
                    {foreach from=$roomsList item=room}
                        <option value="{$room->getIdRoom()}">
                            {$room->getName()} (ID: {$room->getIdRoom()}, Posti: {$room->getBeds()})
                        </option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label for="checkInDate">Data Check-in:</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" min="{$smarty.now|date_format:'%Y-%m-%d'}" required>
            </div>

            <div class="form-group">
                <label for="checkOutDate">Data Check-out:</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" min="{$smarty.now|date_format:'%Y-%m-%d'}" required>
            </div>

            <div class="form-group">
                <label for="idSpecialOffer">Offerta Speciale (opzionale):</label>
                <select class="form-control" id="idSpecialOffer" name="idSpecialOffer">
                    <option value="">Nessuna Offerta</option>
                    {foreach from=$offersList item=offer}
                        <option value="{$offer->getIdSpecialOffer()}">
                            {$offer->getTitle()} ({$offer->getSpecialPrice()}€)
                        </option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Prenotazione</button>
                <a href="/albergoPulito/public/Admin/manageBookings" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='footer_admin.tpl'}

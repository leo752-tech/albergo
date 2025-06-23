

{include file='admin/header_admin.tpl' pageTitle='Modifica Prenotazione'}

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifica Prenotazione</h1>
    </div>

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

    <div class="form-grid">
        <form action="{$base_url}admin/process_edit_booking.php?id={$booking->getIdBooking()|default:''}" method="POST">
            <input type="hidden" name="idBooking" value="{$booking->getIdBooking()|default:''}">

            <div class="form-group">
                <label for="idRegisteredUser">Utente:</label>
                {* Presuppone $usersList per popolare la select *}
                <select class="form-control" id="idRegisteredUser" name="idRegisteredUser" required>
                    {if !empty($usersList)}
                        {foreach $usersList as $user}
                            <option value="{$user->getIdUser()|default:$user.idUser}" {if $booking->getIdRegisteredUser() eq ($user->getIdUser()|default:$user.idUser)}selected{/if}>
                                {$user->getFirstName()|default:$user.firstName} {$user->getLastName()|default:$user.lastName} (ID: {$user->getIdUser()|default:$user.idUser})
                            </option>
                        {/foreach}
                    {else}
                        <option value="">Nessun utente disponibile</option>
                    {/if}
                </select>
            </div>

            <div class="form-group">
                <label for="idRoom">Camera:</label>
                {* Presuppone $roomsList per popolare la select *}
                <select class="form-control" id="idRoom" name="idRoom" required>
                    {if !empty($roomsList)}
                        {foreach $roomsList as $room}
                            <option value="{$room->getIdCamera()|default:$room.idCamera}" {if $booking->getIdRoom() eq ($room->getIdCamera()|default:$room.idCamera)}selected{/if}>
                                {$room->getName()|default:$room.name} (ID: {$room->getIdCamera()|default:$room.idCamera}, Posti: {$room->getBeds()|default:$room.beds})
                            </option>
                        {/foreach}
                    {else}
                        <option value="">Nessuna camera disponibile</option>
                    {/if}
                </select>
            </div>

            <div class="form-group">
                <label for="checkInDate">Data Check-in:</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="{$booking->getCheckInDate()|default:''}" required>
            </div>

            <div class="form-group">
                <label for="checkOutDate">Data Check-out:</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="{$booking->getCheckOutDate()|default:''}" required>
            </div>
            
            <div class="form-group">
                <label for="totalPrice">Prezzo Totale (€):</label>
                <input type="number" step="0.01" class="form-control" id="totalPrice" name="totalPrice" value="{$booking->getTotalPrice()|string_format:'%.2f'|default:''}" required min="0">
            </div>

            <div class="form-group">
                <label for="cancellation">Cancellata:</label>
                <select class="form-control" id="cancellation" name="cancellation" required>
                    <option value="0" {if $booking->isCancelled() eq 0}selected{/if}>No</option>
                    <option value="1" {if $booking->isCancelled() eq 1}selected{/if}>Sì</option>
                </select>
            </div>

            <div class="form-group">
                <label for="idSpecialOffer">Offerta Speciale (Opzionale):</label>
                {* Presuppone $offersList per popolare la select *}
                <select class="form-control" id="idSpecialOffer" name="idSpecialOffer">
                    <option value="">Nessuna Offerta</option>
                    {if !empty($offersList)}
                        {foreach $offersList as $offer}
                            <option value="{$offer->getIdOffer()|default:$offer.idOffer}" {if $booking->getIdSpecialOffer() eq ($offer->getIdOffer()|default:$offer.idOffer)}selected{/if}>
                                {$offer->getName()|default:$offer.name} ({$offer->getDiscount()|default:$offer.discount}% di sconto)
                            </option>
                        {/foreach}
                    {/if}
                </select>
            </div>
            
            <div class="form-group full-width">
                <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                <a href="{$base_url}admin/bookings.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}
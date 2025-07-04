{include file='admin/header_admin.tpl' pageTitle=$pageTitle}

<h2>Gestione Prenotazioni</h2>

<a href="/hotel_reservation/admin/add_booking.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Prenotazione</a>

{* Mostra eventuali messaggi di errore *}
{if $errorMessage}
    <div class="alert alert-danger" role="alert">
        {$errorMessage}
    </div>
{/if}
{* Mostra eventuali messaggi di successo *}
{if $successMessage}
    <div class="alert alert-success" role="alert">
        {$successMessage}
    </div>
{/if}

<table class="admin-table">
    <thead>
        <tr>
            <th>ID Prenotazione</th>
            <th>ID Utente</th>    
            <th>ID Camera</th>    
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Prezzo Totale</th>
            <th>Data Prenotazione</th>
            <th>Cancellata</th>
            <th>ID Offerta Speciale</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        {if $bookings}
            {foreach $bookings as $booking}
            <tr>
                <td>{$booking->getId()}</td>
                {* OPTIONAL: Se hai popolato userNameDisplay in bookings.php, usalo qui *}
                {* <td>{$booking->userNameDisplay|default:$booking->getIdRegisteredUser()}</td> *}
                <td>{$booking->getIdRegisteredUser()}</td> 

                {* OPTIONAL: Se hai popolato roomNameDisplay in bookings.php, usalo qui *}
                {* <td>{$booking->roomNameDisplay|default:$booking->getIdRoom()}</td> *}
                <td>{$booking->getIdRoom()}</td>

                {* Formatta le date dagli oggetti DateTime *}
                <td>{$booking->getCheckInDate()->format('Y-m-d')}</td> 
                <td>{$booking->getCheckOutDate()->format('Y-m-d')}</td>
                <td>{$booking->getTotalPrice()|string_format:"%.2f"} €</td>
                <td>{$booking->getBookingDate()->format('Y-m-d H:i:s')}</td> 
                {* Gestisci la visualizzazione del booleano cancellation *}
                <td>{if $booking->getCancellation()}Sì{else}No{/if}</td>
                {* Mostra l'ID dell'offerta speciale o N/A se è null *}
                <td>{if $booking->getIdSpecialOffer()}{$booking->getIdSpecialOffer()}{else}N/A{/if}</td>
                <td>
                    <a href="/hotel_reservation/admin/edit_booking.php?id={$booking->getId()}" class="btn btn-sm btn-primary">Modifica</a>
                    <a href="/hotel_reservation/admin/delete_booking.php?id={$booking->getId()}" class="btn btn-sm btn-danger">Elimina</a>
                </td>
            </tr>
            {/foreach}
        {else}
            <tr>
                {* Aggiorna il colspan in base al numero di colonne nell'intestazione *}
                <td colspan="10">Nessuna prenotazione trovata.</td>
            </tr>
        {/if}
    </tbody>
</table>

{include file='admin/footer_admin.tpl'}
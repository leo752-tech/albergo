

{include file='header.tpl' pageTitle='Le Mie Prenotazioni'}

<section id="my-bookings" class="container section-padding">
    <h2>Le Tue Prenotazioni</h2>

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

    {* Controlla se ci sono prenotazioni da visualizzare *}
    {if !empty($bookings)}
        <div class="table-responsive">
            <table class="user-bookings-table">
                <thead>
                    <tr>
                        <th>ID Prenotazione</th>
                        <th>Camera</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Prezzo Totale</th>
                        <th>Stato</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                
                    {foreach $bookings as $booking}
                        <tr>
                            <td>{$booking->getIdBooking()|default:$booking.idBooking}</td>
                            <td>{$booking->getRoomName()|default:$booking.roomName}</td> 
                            <td>{$booking->getCheckInDate()|date_format:"%d/%m/%Y"|default:$booking.checkInDate}</td>
                            <td>{$booking->getCheckOutDate()|date_format:"%d/%m/%Y"|default:$booking.checkOutDate}</td>
                            <td>{$booking->getTotalPrice()|string_format:"%.2f"|default:'N/A'} €</td>
                            <td>
                                {if $booking->isCancelled()|default:$booking.cancelled}
                                    <span class="status-cancelled">Cancellata</span>
                                {elseif $booking->getCheckOutDate() < $smarty.now|date_format:"%Y-%m-%d"}
                                    <span class="status-completed">Completata</span>
                                {elseif $booking->getCheckInDate() <= $smarty.now|date_format:"%Y-%m-%d" && $booking->getCheckOutDate() >= $smarty.now|date_format:"%Y-%m-%d"}
                                    <span class="status-active">Attiva</span>
                                {else}
                                    <span class="status-upcoming">In Arrivo</span>
                                {/if}
                            </td>
                            <td>
                                {if !$booking->isCancelled()|default:$booking.cancelled && $booking->getCheckInDate() > $smarty.now|date_format:"%Y-%m-%d"}
                                    {* Permetti la cancellazione solo se la prenotazione non è cancellata e il check-in non è ancora passato *}
                                    <form action="{$base_url}user/process_cancel_booking.php" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="idBooking" value="{$booking->getIdBooking()|default:$booking.idBooking}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler cancellare questa prenotazione?');">Cancella</button>
                                    </form>
                                {else}
                                    Nessuna azione disponibile
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    {else}
        <div class="alert alert-info" role="alert">
            Non hai ancora effettuato nessuna prenotazione. <a href="{$base_url}rooms.php">Esplora le nostre camere!</a>
        </div>
    {/if}
</section>

{include file='footer.tpl'}


<style>
    .user-bookings-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .user-bookings-table th, .user-bookings-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    .user-bookings-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .status-cancelled {
        color: #dc3545; /* Rosso */
        font-weight: bold;
    }
    .status-completed {
        color: #6c757d; /* Grigio */
        font-weight: bold;
    }
    .status-active {
        color: #007bff; /* Blu */
        font-weight: bold;
    }
    .status-upcoming {
        color: #ffc107; /* Giallo/Arancione */
        font-weight: bold;
    }
</style>
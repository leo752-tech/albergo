

{include file='header.tpl' pageTitle='my bookings'}

<section id="my-bookings" class="container section-padding">
    <h2>Le Tue Prenotazioni</h2>

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
                            <td>{$booking->getId()|default:$booking.idBooking}</td>
                            <td>{$booking->getIdRoom()|default:$booking.roomName}</td> 
                            <td>{$booking->getCheckInDate()->format('d-m-Y')|date_format:"%d/%m/%Y"|default:$booking.checkInDate}</td>
                            <td>{$booking->getCheckOutDate()->format('d-m-Y')|date_format:"%d/%m/%Y"|default:$booking.checkOutDate}</td>
                            <td>{$booking->getTotalPrice()|string_format:"%.2f"|default:'N/A'} €</td>
                            <td>
                                {if $booking->getCancellation()|default:$booking.cancelled}
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
                                {if !$booking->getCancellation()|default:$booking.cancelled && $booking->getCheckInDate() > $smarty.now|date_format:"%Y-%m-%d"}
                                    {* Permetti la cancellazione solo se la prenotazione non è cancellata e il check-in non è ancora passato *}
                                    <form action="/albergoPulito/public/User/deleteBooking/{$booking->getId()}" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="idBooking" value="{$booking->getId()|default:$booking.idBooking}">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Sei sicuro di voler cancellare questa prenotazione?');">Cancella</button>
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
        <div class="profile-actions" role="alert">
            Non hai ancora effettuato nessuna prenotazione.<a href="/albergoPulito/public/User/showAccountDetails" class="btn btn-primary">Torna indietro</a>
        </div>
    {/if}
</section>

{include file='footer.tpl'}



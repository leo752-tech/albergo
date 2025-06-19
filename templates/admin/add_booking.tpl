<h2>Aggiungi Nuova Prenotazione</h2>
<form action="add_booking.php" method="POST">
    <label for="idRegisteredUser">Utente Registrato:</label>
    <select id="idRegisteredUser" name="idRegisteredUser" required>
        {foreach $registeredUsers as $user}
            <option value="{$user->getIdRegisteredUser()}">{$user->getFirstName()} {$user->getLastName()} ({$user->getEmail()})</option>
        {/foreach}
    </select><br><br>

    <label for="idRoom">Camera:</label>
    <select id="idRoom" name="idRoom" required>
        {foreach $rooms as $room}
            <option value="{$room->getIdRoom()}">{$room->getName()} (ID: {$room->getIdRoom()}) - Prezzo: {$room->getPricePerNight()|string_format:"%.2f"}€</option>
        {/foreach}
    </select><br><br>

    <label for="checkInDate">Data Check-in:</label>
    <input type="date" id="checkInDate" name="checkInDate" required><br><br>

    <label for="checkOutDate">Data Check-out:</label>
    <input type="date" id="checkOutDate" name="checkOutDate" required><br><br>

    <label for="totalPrice">Prezzo Totale:</label>
    <input type="number" step="0.01" id="totalPrice" name="totalPrice" required><br><br>

    <label for="cancellation">Cancellata:</label>
    <input type="checkbox" id="cancellation" name="cancellation" value="1"><br><br>

    <label for="idSpecialOffer">ID Offerta Speciale (Opzionale):</label>
    <input type="number" id="idSpecialOffer" name="idSpecialOffer"><br><br>

    <button type="submit">Salva Prenotazione</button>
</form>
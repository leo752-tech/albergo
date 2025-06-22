{include file='header.tpl'}

<section id="booking-form" class="container section-padding">
    <h2>Prenota il Tuo Soggiorno</h2>
    <form action="/albergoPulito/public/Booking/getAvailableRooms" method="POST" class="form-grid">
        <div class="form-group">
            <label for="check-in">Data Check-in:</label>
            <input type="date" id="check-in" name="data_check_in" required>
        </div>
        <div class="form-group">
            <label for="check-out">Data Check-out:</label>
            <input type="date" id="check-out" name="data_check_out" required>
        </div>
        <div class="form-group">
            <label for="num-adults">Adulti:</label>
            <input type="number" id="num-adults" name="num_adulti" min="1" value="1" required>
        </div>
        <div class="form-group">
            <label for="num-children">Bambini:</label>
            <input type="number" id="num-children" name="num_bambini" min="0" value="0">
        </div>

        <div class="form-group full-width">
            <label for="room-selection">Seleziona Camera:</label>
            <select id="room-selection" name="id_camera" required>
                <option value="">Scegli una camera disponibile</option>
                <option value="1">Camera Doppia Standard - €120/notte</option>
                <option value="2">Suite Panoramica - €250/notte</option>
                </select>
        </div>

        <div class="form-group full-width">
            <label>Servizi Extra (opzionale):</label>
            <div class="checkbox-group">
                <input type="checkbox" id="service-colazione" name="servizi_extra[]" value="1">
                <label for="service-colazione">Colazione in Camera (€15)</label><br>
                
                <input type="checkbox" id="service-spa" name="servizi_extra[]" value="2">
                <label for="service-spa">Accesso SPA (€30/persona)</label><br>

                <input type="checkbox" id="service-transfer" name="servizi_extra[]" value="3">
                <label for="service-transfer">Transfer Aeroportuale (€50)</label><br>
                </div>
        </div>

        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Conferma Prenotazione</button>
        </div>
    </form>
</section>

{include file='footer.tpl'}
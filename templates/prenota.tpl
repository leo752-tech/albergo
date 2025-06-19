{include file='header.tpl' pageTitle=$pageTitle}

<section id="booking-form" class="container section-padding">
    <h2>Prenota il Tuo Soggiorno</h2>
    <form action="process_booking.php" method="POST" class="form-grid">
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

        {* Campo nascosto per l'ID della camera se viene passato dalla URL *}
        {if $camera_id}
        <div class="form-group">
            <label for="camera_id">ID Camera:</label>
            <input type="text" id="camera_id" name="camera_id" value="{$camera_id}" readonly>
        </div>
        {/if}

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
<?php
require_once 'core/EUtente.php';
require_once 'core/ECamera.php';
require_once 'core/EPrenotazione.php';
require_once 'core/ERecensione.php';
require_once 'core/EServizioExtra.php';
require_once 'core/FDataMapper.php';
require_once 'core/FUtente.php';
require_once 'core/FCamera.php';
require_once 'core/FPrenotazione.php';
require_once 'core/FRecensione.php';
require_once 'core/FServizioExtra.php';
require_once 'core/UConfiguraPeriodi.php';
require_once 'core/UHTTP.php';

$pageTitle = "Prenota la Tua Camera - Nome Hotel";
include 'includes/header.php';
?>

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
            <h3>Dati del Prenotante:</h3>
            <label for="prenotante-nome">Nome:</label>
            <input type="text" id="prenotante-nome" name="nome_prenotante" required>

            <label for="prenotante-cognome">Cognome:</label>
            <input type="text" id="prenotante-cognome" name="cognome_prenotante" required>

            <label for="prenotante-mail">Email:</label>
            <input type="email" id="prenotante-mail" name="mail_prenotante" required>

            <label for="prenotante-nascita">Data di Nascita:</label>
            <input type="date" id="prenotante-nascita" name="data_nascita_prenotante" required>

            <label for="prenotante-comune">Comune di Nascita:</label>
            <input type="text" id="prenotante-comune" name="comune_nascita_prenotante" required>
        </div>

        <div class="form-group full-width">
            <h3>Ospiti Aggiuntivi:</h3>
            <div id="additional-guests-container">
                <p>Nessun ospite aggiuntivo al momento.</p>
            </div>
            <button type="button" class="btn btn-secondary" id="add-guest-btn">Aggiungi Ospite</button>
        </div>

        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Conferma Prenotazione</button>
        </div>
    </form>
</section>

<?php include 'includes/footer.php'; ?>
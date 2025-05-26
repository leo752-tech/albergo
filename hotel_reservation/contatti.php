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

$pageTitle = "Contatti - Nome Hotel";
include 'includes/header.php';
?>

<section id="contact-info" class="container section-padding">
    <h2>Contattaci</h2>
    <p>Siamo a vostra disposizione per qualsiasi informazione o richiesta. Non esitate a contattarci!</p>

    <div class="contact-details">
        <p><i class="fa fa-map-marker"></i> <strong>Indirizzo:</strong> Coppito, L'Aquila, Italia</p>
        <p><i class="fa fa-phone"></i> <strong>Telefono:</strong> +39 3423453456</p>
        <p><i class="fa fa-fax"></i> <strong>Fax:</strong> +39 3423453456</p>
        <p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:info@nomehotel.it">info@nomehotel.it</a></p>
        <p><i class="fa fa-clock"></i> <strong>Orari:</strong> Lun-Dom: 08:00 - 22:00</p>
    </div>

    <div class="contact-map mt-5">
        <h3>Dove Trovarci</h3>
        <iframe 
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2947.5888880811613!2d13.280425076109903!3d42.372599971191725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDLCsDIyJzIxLjQiTiAxM8KwMTYnNTguOCJF!5e0!3m2!1sit!2sit!4v1748249989515!5m2!1sit!2sit"
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>

    <div class="contact-form mt-5">
        <h3>Inviaci un Messaggio</h3>
        <form action="process_contact_form.php" method="POST" class="form-grid">
            <div class="form-group">
                <label for="contact-name">Nome:</label>
                <input type="text" id="contact-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="contact-email">Email:</label>
                <input type="email" id="contact-email" name="email" required>
            </div>
            <div class="form-group full-width">
                <label for="contact-subject">Oggetto:</label>
                <input type="text" id="contact-subject" name="subject">
            </div>
            <div class="form-group full-width">
                <label for="contact-message">Messaggio:</label>
                <textarea id="contact-message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-primary">Invia Messaggio</button>
            </div>
        </form>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
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

$pageTitle = "Recensioni - Nome Hotel";
include 'includes/header.php';
?>

<section id="reviews-section" class="container section-padding">
    <h2>Recensioni dei Nostri Ospiti</h2>
    <p>Siamo orgogliosi di condividere le esperienze dei nostri ospiti. Leggi cosa dicono di noi!</p>

    <div class="review-list">
        <article class="review-card">
            <div class="review-header">
                <h4>Titolo della Recensione 1</h4>
                <div class="rating">
                    <span>★★★★☆</span> </div>
            </div>
            <p class="review-author">Scritto da: Nome Utente 1 - 15 Maggio 2025</p>
            <p class="review-description">Descrizione dettagliata della recensione. Un soggiorno davvero piacevole, la camera era pulita e il personale molto accogliente. Torneremo!</p>
        </article>

        <article class="review-card">
            <div class="review-header">
                <h4>Ottima Esperienza</h4>
                <div class="rating">
                    <span>★★★★★</span> </div>
            </div>
            <p class="review-author">Scritto da: Nome Utente 2 - 10 Aprile 2025</p>
            <p class="review-description">Tutto perfetto, dalla colazione al servizio in camera. La posizione è ideale per esplorare la città.</p>
        </article>

        </div>

    <div class="text-center mt-4">
        <h3>Lascia la Tua Recensione</h3>
        <p>Hai soggiornato da noi? Condividi la tua esperienza!</p>
        <a href="login.php" class="btn btn-primary">Accedi per Recensire</a> </div>
</section>

<?php include 'includes/footer.php'; ?>
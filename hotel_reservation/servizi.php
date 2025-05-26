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

$pageTitle = "Servizi Extra - Nome Hotel";
include 'includes/header.php';
?>

<section id="services-list" class="container section-padding">
    <h2>I Nostri Servizi Extra</h2>
    <p>Rendete il vostro soggiorno ancora più speciale con i nostri servizi aggiuntivi pensati per ogni vostra esigenza.</p>

    <div class="service-grid">
        <article class="service-card">
            <img src="https://cdn.blastness.biz/media/635/gallery/thumbs/full/1024-colazione-in-camera.jpg" alt="Colazione in Camera">
            <div class="service-info">
                <h3>Colazione in Camera</h3>
                <p>Iniziate la giornata con una deliziosa colazione servita direttamente nella vostra camera.</p>
                <span class="price">€15.00</span>
                <a href="prenota.php?add_service=colazione" class="btn btn-secondary">Aggiungi alla Prenotazione</a>
            </div>
        </article>

        <article class="service-card">
            <img src="https://www.lecampsuite.it/wp-content/uploads/2019/06/spa-wellness-padova3-1024x650.jpg" alt="Accesso SPA">
            <div class="service-info">
                <h3>Accesso SPA</h3>
                <p>Rilassatevi e rigeneratevi nella nostra area benessere con piscina, sauna e bagno turco.</p>
                <span class="price">€30.00/persona</span>
                <a href="prenota.php?add_service=spa" class="btn btn-secondary">Aggiungi alla Prenotazione</a>
            </div>
        </article>

        <article class="service-card">
            <img src="https://www.legalshuttle.it/wp-content/uploads/2023/04/vip-airportserv-banner.jpg" alt="Servizio Transfer">
            <div class="service-info">
                <h3>Transfer Aeroportuale</h3>
                <p>Servizio di trasferimento da/per l'aeroporto, comodo e senza stress.</p>
                <span class="price">€50.00</span>
                <a href="prenota.php?add_service=transfer" class="btn btn-secondary">Aggiungi alla Prenotazione</a>
            </div>
        </article>

        </div>
</section>

<?php include 'includes/footer.php'; ?>
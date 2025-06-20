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

$pageTitle = "Home - Nome Hotel";
include 'includes/header.php';
?>

<section id="hero">
    <div class="hero-content">
        <h2>Benvenuti al Nome Hotel</h2>
        <p>Dove l'eleganza incontra il comfort. Prenota la tua esperienza indimenticabile oggi!</p>
        <a href="prenota.php" class="btn btn-large">Prenota Ora</a>
    </div>
</section>

<section id="about-us" class="container section-padding">
    <h2>Chi Siamo</h2>
        <h1>Benvenuti all'Hotel [Nome dell'Hotel] a L'Aquila</h1>

        <p>Immergetevi nel cuore dell'Abruzzo soggiornando all'<strong>Hotel [Nome dell'Hotel]</strong>, la vostra base ideale per esplorare la storica città di L'Aquila e le sue meraviglie circostanti. Che siate qui per affari, per una vacanza rilassante o per scoprire il ricco patrimonio culturale di questa regione, il nostro hotel offre un'esperienza indimenticabile.</p>

        ---

        <h2>Posizione Strategica</h2>
        <p>Situato in una posizione privilegiata, l'Hotel [Nome dell'Hotel] vi permette di raggiungere facilmente i principali punti di interesse di L'Aquila, come la <strong>Fontana delle 99 Cannelle</strong>, il <strong>Castello Cinquecentesco</strong> e la <strong>Basilica di Collemaggio</strong>. Godetevi la comodità di essere a pochi passi dal centro storico, ricco di negozi, ristoranti e caffè.</p>

        ---

        <h2>Comfort e Ospitalità</h2>
        <p>Le nostre camere, arredate con gusto e dotate di tutti i comfort moderni, vi garantiranno un soggiorno piacevole e riposante. Ogni dettaglio è pensato per il vostro benessere, dalla connessione <strong>Wi-Fi gratuita</strong> all'<strong>aria condizionata</strong>, dalla <strong>TV a schermo piatto</strong> al <strong>bagno privato</strong>. Al mattino, iniziate la giornata con una ricca colazione a buffet, con prodotti freschi e tipici del territorio.</p>

        ---

        <h2>Servizi e Facilitazioni</h2>
        <p>L'Hotel [Nome dell'Hotel] offre una gamma di servizi pensati per rendere il vostro soggiorno ancora più confortevole:</p>
        <ul>
            <li>Parcheggio privato</li>
            <li>Bar accogliente dove rilassarsi dopo una giornata di visite</li>
            <li>Reception sempre a vostra disposizione per qualsiasi esigenza o informazione turistica</li>
        </ul>

        ---

        <h2>Esplorate L'Aquila e Dintorni</h2>
        <p>Dalla nostra posizione, potrete facilmente avventurarvi alla scoperta delle bellezze naturali dell'Abruzzo, dal <strong>Parco Nazionale del Gran Sasso e Monti della Laga</strong> alle affascinanti vette appenniniche. Saremo lieti di aiutarvi a organizzare escursioni e itinerari per vivere al meglio la vostra esperienza abruzzese.</p>
</section>

<section id="featured-rooms" class="container section-padding">
    <h2>Le Nostre Camere in Evidenza</h2>
    <div class="room-gallery">
        <div class="room-card">
            <img src="https://www.hotelnoventa.com/wp-content/uploads/2016/08/800_1673.jpg" alt="Camera Doppia">
            <h3>Camera Doppia Deluxe</h3>
            <p>Spaziosa e confortevole, ideale per coppie.</p>
            <a href="camere.php#doppia" class="btn btn-secondary">Scopri di più</a>
        </div>
        <div class="room-card">
            <img src="https://cdn-ickbl.nitrocdn.com/FnMGClZYPwbblKSNarxZTkAfIpQLXrDo/assets/images/optimized/rev-ad6dafa/www.gruppo5.it/wp-content/uploads/2018/07/suite-i-love-you-1.jpg" alt="Suite Lusso">
            <h3>Suite Presidenziale</h3>
            <p>Il massimo del lusso con vista panoramica.</p>
            <a href="camere.php#suite" class="btn btn-secondary">Scopri di più</a>
        </div>
        </div>
    <div class="text-center">
        <a href="camere.php" class="btn btn-primary">Vedi tutte le Camere</a>
    </div>
</section>

<section id="testimonials" class="container section-padding">
    <h2>Cosa dicono di noi</h2>
    <div class="testimonial-slider">
        <div class="testimonial-card">
            <p>"Soggiorno fantastico! Camera pulita e personale gentilissimo."</p>
            <p class="author">- Mario Rossi</p>
        </div>
        <div class="testimonial-card">
            <p>"Posizione perfetta e colazione deliziosa. Torneremo sicuramente!"</p>
            <p class="author">- Laura Bianchi</p>
        </div>
    </div>
    <div class="text-center">
        <a href="recensioni.php" class="btn btn-primary">Leggi tutte le Recensioni</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
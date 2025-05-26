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

$pageTitle = "Il Mio Profilo - Nome Hotel";
include 'includes/header.php';

// Esempio: In un'applicazione reale, qui controlleresti se l'utente è loggato
// Se non è loggato, reindirizzi a login.php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }

// Esempio: Recupero dei dati utente (dovresti usare FUtente)
// $user = FUtente::getUtenteById($_SESSION['user_id']);
// if (!$user) {
//     // Utente non trovato, probabilmente sessione invalida
//     header('Location: login.php?error=invalid_session');
//     exit;
// }

// Variabili placeholder per dimostrazione
$nomeUtente = "Mario";
$cognomeUtente = "Rossi";
$emailUtente = "mario.rossi@example.com";
$dataNascitaUtente = "1990-01-01";
$comuneNascitaUtente = "Roma";

?>

<section id="user-profile" class="container section-padding">
    <h2>Benvenuto, <?php echo htmlspecialchars($nomeUtente); ?>!</h2>
    <div class="profile-info">
        <h3>I Tuoi Dati</h3>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nomeUtente); ?></p>
        <p><strong>Cognome:</strong> <?php echo htmlspecialchars($cognomeUtente); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($emailUtente); ?></p>
        <p><strong>Data di Nascita:</strong> <?php echo htmlspecialchars($dataNascitaUtente); ?></p>
        <p><strong>Comune di Nascita:</strong> <?php echo htmlspecialchars($comuneNascitaUtente); ?></p>
        <button class="btn btn-secondary">Modifica Profilo</button>
    </div>

    <div class="my-bookings mt-5">
        <h3>Le Tue Prenotazioni</h3>
        <div class="booking-list">
            <article class="booking-card">
                <h4>Prenotazione #12345</h4>
                <p><strong>Camera:</strong> Doppia Standard</p>
                <p><strong>Check-in:</strong> 01 Luglio 2025</p>
                <p><strong>Check-out:</strong> 05 Luglio 2025</p>
                <p><strong>Servizio Extra:</strong> Colazione in Camera</p>
                <p><strong>Stato:</strong> Confermata</p>
                <a href="view_booking.php?id=12345" class="btn btn-sm btn-primary">Dettagli</a>
                <button class="btn btn-sm btn-danger">Cancella</button>
            </article>

            <article class="booking-card cancelled">
                <h4>Prenotazione #67890</h4>
                <p><strong>Camera:</strong> Suite Panoramica</p>
                <p><strong>Check-in:</strong> 10 Settembre 2025</p>
                <p><strong>Check-out:</strong> 15 Settembre 2025</p>
                <p><strong>Servizio Extra:</strong> Accesso SPA</p>
                <p><strong>Stato:</strong> Cancellata</p>
                <a href="view_booking.php?id=67890" class="btn btn-sm btn-primary">Dettagli</a>
            </article>

            </div>
    </div>

    <div class="my-reviews mt-5">
        <h3>Le Tue Recensioni</h3>
        <div class="review-list">
            <article class="review-card">
                <h4>La Mia Recensione sulla Camera Doppia</h4>
                <div class="rating"><span>★★★★☆</span></div>
                <p class="review-date">Scritta il: 20 Maggio 2025</p>
                <p class="review-description">Ottima esperienza, camera pulita e confortevole. Consigliato!</p>
                <button class="btn btn-sm btn-secondary">Modifica</button>
                <button class="btn btn-sm btn-danger">Elimina</button>
            </article>
            </div>
    </div>

    <div class="text-center mt-5">
        <a href="process_logout.php" class="btn btn-danger">Esci</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
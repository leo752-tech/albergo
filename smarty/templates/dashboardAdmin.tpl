<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hotel Management</title>
    <link rel="stylesheet" href="/~momok/assets/css/style.css">
    </head>
<body>
    <header>
        <h1>Dashboard Amministratore</h1>
        <nav>
            <ul>
                <li><a href="dashboard_admin.html">Home</a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar">
            <h2>Menu Principale</h2>
            <ul>
                <li><a href="setup_camere.html">Setup Camere</a></li>
                <li><a href="utenti.html">Utenti</a></li>
                <li><a href="calendario.html">Calendario Prenotazioni</a></li>
                <li><a href="dati_statistiche.html">Dati e Statistiche</a></li>
                <li><a href="offerte_speciali.html">Offerte Speciali</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Benvenuto nella tua Dashboard</h2>
            <p>Qui puoi gestire tutti gli aspetti del tuo albergo. Utilizza il menu a sinistra per navigare tra le diverse sezioni.</p>

            <section class="quick-stats">
                <h3>Riepilogo Rapido</h3>
                <div class="stat-cards">
                    <div class="card">
                        <h4>Prenotazioni Oggi</h4>
                        <p><strong>5</strong></p>
                    </div>
                    <div class="card">
                        <h4>Camere Disponibili</h4>
                        <p><strong>12</strong></p>
                    </div>
                    <div class="card">
                        <h4>Arrivi Previsti</h4>
                        <p><strong>3</strong></p>
                    </div>
                    <div class="card">
                        <h4>Partenze Previste</h4>
                        <p><strong>2</strong></p>
                    </div>
                </div>
            </section>

            <section class="recent-activity">
                <h3>Attività Recenti</h3>
                <ul>
                    <li>Prenotazione #1234 di Mario Rossi per Camera 101 (20/07 - 25/07)</li>
                    <li>Nuovo utente registrato: Anna Verdi</li>
                    <li>Modifica disponibilità Camera 203</li>
                    <li>Offerta speciale "Sconto Estivo" attivata</li>
                </ul>
            </section>
        </main>
    </div>

    <footer>
        <p>&copy; 2025 Hotel Management System. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
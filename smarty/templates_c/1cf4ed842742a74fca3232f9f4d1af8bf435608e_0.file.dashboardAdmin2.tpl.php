<?php
/* Smarty version 4.3.2, created on 2025-06-18 18:33:29
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\dashboardAdmin2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6852ea596025f8_11614460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cf4ed842742a74fca3232f9f4d1af8bf435608e' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\dashboardAdmin2.tpl',
      1 => 1750264401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6852ea596025f8_11614460 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hotel Management</title>
    <link rel="stylesheet" href="/~momok/assets/css/style2.css">
    </head>
<body>
    <header>
        <div class="header-content">
            <h1>Dashboard Amministratore</h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="dashboard_admin.html">Home</a></li>
                    <li><a href="logout.html">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-wrapper">
        <aside class="sidebar">
            <h2>Menu di Navigazione</h2>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="setup_camere.html">Setup Camere</a></li>
                    <li><a href="utenti.html">Utenti</a></li>
                    <li><a href="calendario.html">Calendario Prenotazioni</a></li>
                    <li><a href="dati_statistiche.html">Dati e Statistiche</a></li>
                    <li><a href="offerte_speciali.html">Offerte Speciali</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content-area">
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
</html><?php }
}

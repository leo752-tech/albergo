{include file='header_admin.tpl' pageTitle='Dashboard Amministrazione'}

<h2>Benvenuto nel Pannello di Amministrazione</h2>
<p>Qui puoi gestire tutti gli aspetti del tuo hotel.</p>

<div class="admin-widgets">
    <div class="widget">
        <h3><i class="fas fa-users"></i> Utenti Registrati</h3>
        <p>Totale: {$totalUsers|default:0}</p>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-info">Gestisci Utenti</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-bed"></i> Camere Disponibili</h3>
        <p>Totale: {$availableRooms|default:0}</p>
        <a href="/albergoPulito/public/Admin/manageRooms" class="btn btn-info">Gestisci Camere</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-calendar-alt"></i> Prenotazioni Attive</h3>
        <p>Totale: {$activeBookings|default:0}</p>
        <a href="/albergoPulito/public/Admin/manageBookings" class="btn btn-info">Gestisci Prenotazioni</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-concierge-bell"></i> Servizi Extra</h3>
        <p>Totale: {$totalServices|default:0}</p>
        <a href="/albergoPulito/public/Admin/manageExtraServices" class="btn btn-info">Gestisci Servizi</a>
    </div>
    </div>

{include file='footer_admin.tpl'} 
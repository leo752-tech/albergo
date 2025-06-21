

{include file='admin/header_admin.tpl' pageTitle='Dashboard Amministrativa'}

<div class="container">
    <h2>Dashboard Amministrativa</h2>

    {if $errorMessage}
        <div class="alert alert-danger" role="alert">
            {$errorMessage}
        </div>
    {/if}
    {if $successMessage}
        <div class="alert alert-success" role="alert">
            {$successMessage}
        </div>
    {/if}

    <div class="admin-widgets">
        <div class="widget">
            <h3><i class="fas fa-users"></i> Utenti Registrati</h3>
            <p>{$totalUsers|default:0}</p>
            <small><a href="{$base_url}admin/users.php">Visualizza tutti gli utenti</a></small>
        </div>
        <div class="widget">
            <h3><i class="fas fa-bed"></i> Camere Disponibili</h3>
            <p>{$availableRooms|default:0} / {$totalRooms|default:0}</p>
            <small><a href="{$base_url}admin/rooms.php">Gestisci camere</a></small>
        </div>
        <div class="widget">
            <h3><i class="fas fa-calendar-alt"></i> Prenotazioni Attive</h3>
            <p>{$activeBookings|default:0}</p>
            <small><a href="{$base_url}admin/bookings.php">Gestisci prenotazioni</a></small>
        </div>
        <div class="widget">
            <h3><i class="fas fa-euro-sign"></i> Entrate Totali (Mese)</h3>
            <p>{$monthlyRevenue|string_format:"%.2f"|default:0.00} €</p>
            <small>Basato su prenotazioni completate.</small>
        </div>
        {* Possiamo aggiungere altri widget come: ultime prenotazioni, camere più prenotate, ecc. *}
    </div>

    {* Se vogliamo aggiungere grafici, dovremmo includere librerie JS come Chart.js e passargli i dati *}
    <div class="mt-4">
        <h3>Panoramica Rapida</h3>
        <p>Qui puoi visualizzare informazioni aggiuntive o grafici.</p>
        {* Esempio di sezione per grafici *}
        <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); text-align: center; height: 300px; line-height: 260px;">
            <p>Area per grafici (richiede integrazione JS)</p>
        </div>
    </div>
</div>

{include file='admin/footer_admin.tpl'}
{* Se dovessimo usare librerie grafiche, i loro script dovrebbero essere inclusi nel footer o dopo il main content *}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle|default:'Admin Panel'}</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/admincss.css">
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/manageFile.css"> 
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/calendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="admin-header">
        <div class="container-fluid">
            <h1><a href="/albergoPulito/public/Admin/dashboard">Pannello Amministrazione</a></h1>
            <nav class="admin-nav">
                <ul>
                    <li><a href="/albergoPulito/public/Admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/albergoPulito/public/Admin/manageUsers"><i class="fas fa-users"></i> Utenti</a></li>
                    <li><a href="/albergoPulito/public/Admin/manageRooms"><i class="fas fa-bed"></i> Camere</a></li>
                    <li><a href="/albergoPulito/public/Admin/manageBookings"><i class="fas fa-calendar-alt"></i> Prenotazioni</a></li>
                    <li><a href="/albergoPulito/public/Admin/manageExtraServices"><i class="fas fa-concierge-bell"></i> Servizi</a></li>
                    <li><a href="/albergoPulito/public/Admin/manageSpecialOffer"><i class="fas fa-concierge-bell"></i> Offerte Speciali</a></li>
                    <li><a href="/albergoPulito/public/Admin/showStatistics"><i class="fas fa-chart-line"></i> Statistiche</a></li>


                    {if $admin_logged_in}
                    <li><a href="/albergoPulito/public/User/logout" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout ({$admin_username|default:'Admin'})</a></li>
                    {/if}
                </ul>
            </nav>
        </div>
    </header>
    <main class="admin-main">
        
    

    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prevMonth">Mese Precedente</button>
            <button id="prevYear">Anno Precedente</button>
            <h2 id="monthYearDisplay"></h2>
            <button id="nextYear">Anno Successivo</button>
            <button id="nextMonth">Mese Successivo</button>
        </div>
        <div class="calendar-grid" id="calendarGrid">
            </div>
    </div>

    
{include file='footer_admin.tpl'}
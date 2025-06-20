<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle|default:'Admin Panel'}</title>
    <link rel="stylesheet" href="/~momok/assets/css/admincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="admin-header">
        <div class="container-fluid">
            <h1><a href="/~momok/Admin/dashboard">Pannello Amministrazione</a></h1>
            <nav class="admin-nav">
                <ul>
                    <li><a href="/~momok/Admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/~momok/Admin/manageUsers"><i class="fas fa-users"></i> Utenti</a></li>
                    <li><a href="/~momok/Admin/manageRooms"><i class="fas fa-bed"></i> Camere</a></li>
                    <li><a href="/~momok/Admin/manageBookings"><i class="fas fa-calendar-alt"></i> Prenotazioni</a></li>
                    <li><a href="/~momok/Admin/manageExtraServices"><i class="fas fa-concierge-bell"></i> Servizi</a></li>
                    {if $admin_logged_in}
                    <li><a href="/hotel_reservation/admin/logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout ({$admin_username|default:'Admin'})</a></li>
                    {/if}
                </ul>
            </nav>
        </div>
    </header>
    <main class="admin-main">
        <div class="container-fluid">
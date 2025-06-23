

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle|default:'Pannello Amministrazione'}</title>

    <link rel="stylesheet" href="{$base_url}public/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="admin-header">
        <div class="container-fluid">
            <h1><a href="{$base_url}admin/dashboard.php">Pannello Amministrazione</a></h1>
            <nav class="admin-nav">
                <ul>
                    <li><a href="{$base_url}admin/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{$base_url}admin/users.php"><i class="fas fa-users"></i> Utenti</a></li>
                    <li><a href="{$base_url}admin/rooms.php"><i class="fas fa-bed"></i> Camere</a></li>
                    <li><a href="{$base_url}admin/bookings.php"><i class="fas fa-calendar-alt"></i> Prenotazioni</a></li>
                    <li><a href="{$base_url}admin/services.php"><i class="fas fa-concierge-bell"></i> Servizi</a></li>
                    <li><a href="{$base_url}admin/price_policies.php"><i class="fas fa-percent"></i> Politiche Prezzo</a></li>
                    <li><a href="{$base_url}admin/logout_admin.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout (admin)</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="admin-main">
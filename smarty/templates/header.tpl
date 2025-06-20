<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Nome Hotel - Il Tuo Soggiorno Perfetto'; ?></title>
    <link rel="stylesheet" href="/~momok/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/~momok/"><h1>Nome Hotel</h1></a>
            </div>
            <nav>
                <ul>
                    <li><a href="/~momok/">Home</a></li>
                    <li><a href="/~momok/Room/">Camere</a></li>
                    <li><a href="servizi.php">Servizi</a></li>
                    <li><a href="/~momok/Booking/selectDate">Prenota Ora</a></li>
                    <li><a href="recensioni.php">Recensioni</a></li>
                    <li><a href="contatti.php">Contatti</a></li>
                    <li><a href="/~momok/Booking/showSpecialOffer">Offerte Speciali</a></li>
                    <li><a href="/~momok/User/showFormsLogin" class="btn btn-primary">Accedi/Registrati</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-toggle">☰</button>
        </div>
    </header>
    <main>
    
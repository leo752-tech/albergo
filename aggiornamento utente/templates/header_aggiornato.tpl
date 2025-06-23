

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle|default:'Hotel Reservation System'}</title>
    {* Collega il file CSS principale per il frontend *}
    <link rel="stylesheet" href="{$base_url}public/css/style.css">
    {* Puoi includere anche FontAwesome per le icone *}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="{$base_url}">Nome Hotel</a></h1>
            <nav>
                <ul>
                    <li><a href="{$base_url}">Home</a></li>
                    <li><a href="{$base_url}rooms.php">Camere</a></li>
                    <li><a href="{$base_url}services.php">Servizi</a></li>
                    <li><a href="{$base_url}contact.php">Contatti</a></li>
                    
                    {* --- MENU UTENTE/LOGOUT --- *}
                    {if $isLoggedIn}
                        {* L'utente è loggato *}
                        <li class="dropdown">
                            <a href="#" class="dropbtn">
                                <i class="fas fa-user-circle"></i> Ciao, {$loggedInUser->getFirstName()|default:'Utente'} <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-content">
                                <a href="{$base_url}user/my_bookings.php">Le mie prenotazioni</a>
                                <a href="{$base_url}user/profile.php">Il mio profilo</a>
                                <a href="{$base_url}logout.php">Logout</a>
                            </div>
                        </li>
                    {else}
                        {* L'utente NON è loggato *}
                        <li><a href="{$base_url}login.php">Accedi / Registrati</a></li>
                    {/if}
                    {* --- FINE MENU --- *}
                </ul>
            </nav>
        </div>
    </header>

  
    <style>
        .dropbtn {
            background-color: transparent;
            color: white;
            padding: 14px 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1000; 
            right: 0;
            border-radius: 4px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #e9ecef;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
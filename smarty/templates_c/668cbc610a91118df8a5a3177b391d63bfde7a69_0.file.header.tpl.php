<?php
/* Smarty version 4.3.2, created on 2025-06-24 12:51:41
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685a833d485b89_14434342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '668cbc610a91118df8a5a3177b391d63bfde7a69' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\header.tpl',
      1 => 1750707172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_685a833d485b89_14434342 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo '<?php'; ?>
 echo $pageTitle ?? 'Nome Hotel - Il Tuo Soggiorno Perfetto'; <?php echo '?>'; ?>
</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/albergoPulito/public/"><h1>Nome Hotel</h1></a>
            </div>
            <nav class="desktop-nav">
                <ul>
                    <li><a href="/albergoPulito/public/">Home</a></li>
                    <li><a href="/albergoPulito/public/Room/">Camere</a></li>
                    <li><a href="servizi.php">Servizi</a></li>
                    <li><a href="/albergoPulito/public/Booking/selectDate">Prenota Ora</a></li>
                    <li><a href="recensioni.php">Recensioni</a></li>
                    <li><a href="contatti.php">Contatti</a></li>
                    <li><a href="/albergoPulito/public/Booking/showSpecialOffer">Offerte Speciali</a></li>
                </ul>
            </nav>
            <button class="user-menu-toggle" id="userMenuToggle">
                <i class="fas fa-user-circle"></i>
            </button>
            <button class="mobile-menu-toggle" id="mobileMenuHamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div id="mobile-nav-menu" class="mobile-nav-menu">
            <ul>
                <li><a href="/albergoPulito/public/">Home</a></li>
                <li><a href="/albergoPulito/public/Room/">Camere</a></li>
                <li><a href="servizi.php">Servizi</a></li>
                <li><a href="/albergoPulito/public/Booking/selectDate">Prenota Ora</a></li>
                <li><a href="recensioni.php">Recensioni</a></li>
                <li><a href="contatti.php">Contatti</a></li>
                <li><a href="/albergoPulito/public/Booking/showSpecialOffer">Offerte Speciali</a></li>
            </ul>
        </div>
        <div id="user-actions-menu" class="user-actions-menu">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['is_logged_in']->value) {?>
                                        <li>
                        <a href="/albergoPulito/public/User/showAccountDetails" class="user-action-item">
                            <i class="fas fa-user"></i> <span>Visualizza Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="/albergoPulito/public/User/logout" class="user-action-item">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </a>
                    </li>
                <?php } else { ?>
                                        <li>
                        <a href="/albergoPulito/public/User/showFormsLogin" class="user-action-item">
                            <i class="fas fa-sign-in-alt"></i> <span>Accedi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/albergoPulito/public/User/showFormsLogin" class="user-action-item">
                            <i class="fas fa-user-plus"></i> <span>Registrati</span>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </header>

    <main>
    
<?php }
}

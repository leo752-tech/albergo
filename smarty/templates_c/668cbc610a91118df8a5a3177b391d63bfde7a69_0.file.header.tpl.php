<?php
/* Smarty version 4.3.2, created on 2025-06-22 12:27:56
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6857daacb708e2_37557232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '668cbc610a91118df8a5a3177b391d63bfde7a69' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\header.tpl',
      1 => 1750587970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6857daacb708e2_37557232 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo '<?php'; ?>
 echo $pageTitle ?? 'Nome Hotel - Il Tuo Soggiorno Perfetto'; <?php echo '?>'; ?>
</title>
    <link rel="stylesheet" href="/~momok/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/albergoPulito/public/"><h1>Nome Hotel</h1></a>
            </div>
            <nav>
                <ul>
                    <li><a href="/albergoPulito/public/">Home</a></li>
                    <li><a href="/albergoPulito/public/Room/">Camere</a></li>
                    <li><a href="servizi.php">Servizi</a></li>
                    <li><a href="/albergoPulito/public/Booking/selectDate">Prenota Ora</a></li>
                    <li><a href="recensioni.php">Recensioni</a></li>
                    <li><a href="contatti.php">Contatti</a></li>
                    <li><a href="/albergoPulito/public/Booking/showSpecialOffer">Offerte Speciali</a></li>
                    <li><a href="/albergoPulito/public/User/showFormsLogin" class="btn btn-primary">Accedi/Registrati</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-toggle">☰</button>
        </div>
    </header>
    <main>
    <?php }
}

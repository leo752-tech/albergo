<?php
/* Smarty version 4.3.2, created on 2025-06-10 00:41:38
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68476322c714c0_02131965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12603cd35e4c2295b68e3c68c53b495253fd239' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\header.tpl',
      1 => 1749508887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68476322c714c0_02131965 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo '<?php'; ?>
 echo $pageTitle ?? 'Nome Hotel - Il Tuo Soggiorno Perfetto'; <?php echo '?>'; ?>
</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="index.php"><h1>Nome Hotel</h1></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="camere.php">Camere</a></li>
                    <li><a href="servizi.php">Servizi</a></li>
                    <li><a href="prenota.php">Prenota Ora</a></li>
                    <li><a href="recensioni.php">Recensioni</a></li>
                    <li><a href="contatti.php">Contatti</a></li>
                    <li><a href="~momok/Programmazione_web/progetto/albergoPulito/public/User/showFormsLogin" class="btn btn-primary">Accedi/Registrati</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-toggle">☰</button>
        </div>
    </header>
    <main>
    <?php }
}

<?php
/* Smarty version 4.3.2, created on 2025-06-22 12:39:09
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6857dd4d1e83c9_44451163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac90197b9fb1586ec2c38f3b11cfe5fffd674290' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\header_admin.tpl',
      1 => 1750588067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6857dd4d1e83c9_44451163 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['pageTitle']->value ?? null)===null||$tmp==='' ? 'Admin Panel' ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/admincss.css">
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
                    <?php if ($_smarty_tpl->tpl_vars['admin_logged_in']->value) {?>
                    <li><a href="/albergoPulito/public/Admin/logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout (<?php echo (($tmp = $_smarty_tpl->tpl_vars['admin_username']->value ?? null)===null||$tmp==='' ? 'Admin' ?? null : $tmp);?>
)</a></li>
                    <?php }?>
                </ul>
            </nav>
        </div>
    </header>
    <main class="admin-main">
        <div class="container-fluid"><?php }
}

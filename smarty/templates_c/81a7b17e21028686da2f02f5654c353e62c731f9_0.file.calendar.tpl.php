<?php
/* Smarty version 4.3.2, created on 2025-06-28 12:04:00
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fbe1077e248_63314105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81a7b17e21028686da2f02f5654c353e62c731f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\calendar.tpl',
      1 => 1751034851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fbe1077e248_63314105 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['pageTitle']->value ?? null)===null||$tmp==='' ? 'Admin Panel' ?? null : $tmp);?>
</title>
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


                    <?php if ($_smarty_tpl->tpl_vars['admin_logged_in']->value) {?>
                    <li><a href="/albergoPulito/public/User/logout" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout (<?php echo (($tmp = $_smarty_tpl->tpl_vars['admin_username']->value ?? null)===null||$tmp==='' ? 'Admin' ?? null : $tmp);?>
)</a></li>
                    <?php }?>
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

    
<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

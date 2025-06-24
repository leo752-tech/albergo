<?php
/* Smarty version 4.3.2, created on 2025-06-24 13:09:04
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\dashboardAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685a87501a7972_90798355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a08e2993f9d06854533c2936c93c9a09e7e097ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\dashboardAdmin.tpl',
      1 => 1750588141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685a87501a7972_90798355 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Dashboard Amministrazione'), 0, false);
?>

<h2>Benvenuto nel Pannello di Amministrazione</h2>
<p>Qui puoi gestire tutti gli aspetti del tuo hotel.</p>

<div class="admin-widgets">
    <div class="widget">
        <h3><i class="fas fa-users"></i> Utenti Registrati</h3>
        <p>Totale: <?php echo (($tmp = $_smarty_tpl->tpl_vars['totalUsers']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-info">Gestisci Utenti</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-bed"></i> Camere Disponibili</h3>
        <p>Totale: <?php echo (($tmp = $_smarty_tpl->tpl_vars['availableRooms']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>
        <a href="/albergoPulito/public/admin/rooms.php" class="btn btn-info">Gestisci Camere</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-calendar-alt"></i> Prenotazioni Attive</h3>
        <p>Totale: <?php echo (($tmp = $_smarty_tpl->tpl_vars['activeBookings']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>
        <a href="/albergoPulito/public/admin/bookings.php" class="btn btn-info">Gestisci Prenotazioni</a>
    </div>
    <div class="widget">
        <h3><i class="fas fa-concierge-bell"></i> Servizi Extra</h3>
        <p>Totale: <?php echo (($tmp = $_smarty_tpl->tpl_vars['totalServices']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>
        <a href="/albergoPulito/public/Admin/services.php" class="btn btn-info">Gestisci Servizi</a>
    </div>
    </div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

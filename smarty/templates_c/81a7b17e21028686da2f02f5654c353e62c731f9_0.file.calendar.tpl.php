<?php
/* Smarty version 4.3.2, created on 2025-06-29 13:04:42
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68611dcac86d77_13605237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81a7b17e21028686da2f02f5654c353e62c731f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\calendar.tpl',
      1 => 1751195069,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68611dcac86d77_13605237 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Dinamico</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/calendar.css">
</head>
<body>
    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prevMonth">Mese Precedente</button>
            <button id="prevYear">Anno Precedente</button>
            <h2 id="monthYearDisplay"></h2>
            <button id="nextYear">Anno Successivo</button>
            <button id="nextMonth">Mese Successivo</button>
        </div>
        <div class="calendar-grid" id="calendarGrid"></div>
    </div>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="/albergoPulito/public/Admin/dashboard">
            <button>Vai alla Dashboard Admin</button>
        </a>
    </div>

    <?php echo '<script'; ?>
>
        const bookings = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['bookingsArray']->value ));?>
;
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/albergoPulito/public/assets/js/calendar.js" defer><?php echo '</script'; ?>
>
</body>
</html><?php }
}

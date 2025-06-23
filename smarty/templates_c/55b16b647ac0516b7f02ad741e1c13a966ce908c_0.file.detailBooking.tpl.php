<?php
/* Smarty version 4.3.2, created on 2025-06-23 21:21:16
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\detailBooking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6859a92cb6c9e0_57036689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55b16b647ac0516b7f02ad741e1c13a966ce908c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\detailBooking.tpl',
      1 => 1750630652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6859a92cb6c9e0_57036689 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Giorno</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/detailBooking.css">
</head>
<body>
    <div class="content-container">
        <h1 id="pageTitle"></h1>
        <div id="dayDetails">
                        <?php if ((isset($_smarty_tpl->tpl_vars['bookings']->value)) && count($_smarty_tpl->tpl_vars['bookings']->value) > 0) {?>
                <p>Informazioni per il giorno **<?php echo (($tmp = $_smarty_tpl->tpl_vars['readableDate']->value ?? null)===null||$tmp==='' ? 'Data sconosciuta' ?? null : $tmp);?>
**:</p>
                <h3>Prenotazioni del giorno:</h3>
                <ul class="booking-list">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bookings']->value, 'booking');
$_smarty_tpl->tpl_vars['booking']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['booking']->value) {
$_smarty_tpl->tpl_vars['booking']->do_else = false;
?>
                        <li class="booking-item">
                            <p><strong>ID Prenotazione:</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getId() ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
 
                                <?php if ($_smarty_tpl->tpl_vars['booking']->value->getCancellation()) {?>
                                    <span class="cancelled-booking">(CANCELLATA)</span>
                                <?php }?>
                            </p>
                            <p><strong>Utente (ID):</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getIdRegisteredUser() ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                            <p><strong>Camera (ID):</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getIdRoom() ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                            <p><strong>Check-in:</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getCheckInDate()->format('d/m/Y') ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                            <p><strong>Check-out:</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate()->format('d/m/Y') ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                            <p><strong>Prezzo Totale:</strong> €<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['booking']->value->getTotalPrice(),2,',','.');?>
</p>
                            <p><strong>Data Prenotazione:</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getBookingDate()->format('d/m/Y H:i') ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                            <?php if ($_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer()) {?>
                                <p><strong>Offerta Speciale (ID):</strong> <?php echo $_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer();?>
</p>
                            <?php }?>
                        </li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            <?php } else { ?>
                <p>Nessuna prenotazione registrata per il giorno **<?php echo (($tmp = $_smarty_tpl->tpl_vars['readableDate']->value ?? null)===null||$tmp==='' ? 'Data sconosciuta' ?? null : $tmp);?>
**.</p>
            <?php }?>
        </div>
    </div>
    <a href="/albergoPulito/public/Admin/manageBookings" class="back-link">Torna al Calendario</a>

    <?php echo '<script'; ?>
 src="/albergoPulito/public/assets/js/detailBooking.js" defer><?php echo '</script'; ?>
>

</body>
</html><?php }
}

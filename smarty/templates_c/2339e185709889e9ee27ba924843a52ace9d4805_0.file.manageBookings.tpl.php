<?php
/* Smarty version 4.3.2, created on 2025-06-20 15:53:45
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\manageBookings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685567e9c450c5_74765603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2339e185709889e9ee27ba924843a52ace9d4805' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\manageBookings.tpl',
      1 => 1750426832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685567e9c450c5_74765603 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Gestione Prenotazioni</h2>

<a href="/hotel_reservation/admin/add_booking.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Prenotazione</a>


<table class="admin-table">
    <thead>
        <tr>
            <th>ID Prenotazione</th>
            <th>ID Utente</th>    
            <th>ID Camera</th>    
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Prezzo Totale</th>
            <th>Data Prenotazione</th>
            <th>Cancellata</th>
            <th>ID Offerta Speciale</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['bookings']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bookings']->value, 'booking');
$_smarty_tpl->tpl_vars['booking']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['booking']->value) {
$_smarty_tpl->tpl_vars['booking']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getId();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getIdRegisteredUser();?>
</td> 

                                                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getIdRoom();?>
</td>

                                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getCheckInDate()->format('Y-m-d');?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate()->format('Y-m-d');?>
</td>
                <td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['booking']->value->getTotalPrice());?>
 €</td>
                <td><?php echo $_smarty_tpl->tpl_vars['booking']->value->getBookingDate()->format('Y-m-d H:i:s');?>
</td> 
                                <td><?php if ($_smarty_tpl->tpl_vars['booking']->value->getCancellation()) {?>Sì<?php } else { ?>No<?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer()) {
echo $_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer();
} else { ?>N/A<?php }?></td>
                <td>
                    <a href="/~momok/Admin/deleteBooking/<?php echo $_smarty_tpl->tpl_vars['booking']->value->getId();?>
" class="btn btn-sm btn-danger">Elimina</a>
                </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <tr>
                                <td colspan="10">Nessuna prenotazione trovata.</td>
            </tr>
        <?php }?>
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

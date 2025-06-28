<?php
/* Smarty version 4.3.2, created on 2025-06-28 14:28:37
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\myBookings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fdff5b49b45_24295895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9ab0b5c2350f4f805ecf9dc40fddf620632aa4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\myBookings.tpl',
      1 => 1751106746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685fdff5b49b45_24295895 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'my bookings'), 0, false);
?>

<section id="my-bookings" class="container section-padding">
    <h2>Le Tue Prenotazioni</h2>

        <?php if (!empty($_smarty_tpl->tpl_vars['bookings']->value)) {?>
        <div class="table-responsive">
            <table class="user-bookings-table">
                <thead>
                    <tr>
                        <th>ID Prenotazione</th>
                        <th>Camera</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Prezzo Totale</th>
                        <th>Stato</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bookings']->value, 'booking');
$_smarty_tpl->tpl_vars['booking']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['booking']->value) {
$_smarty_tpl->tpl_vars['booking']->do_else = false;
?>
                        <tr>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getId() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['idBooking'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getIdRoom() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['roomName'] ?? null : $tmp);?>
</td> 
                            <td><?php echo (($tmp = smarty_modifier_date_format($_smarty_tpl->tpl_vars['booking']->value->getCheckInDate()->format('d-m-Y'),"%d/%m/%Y") ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['checkInDate'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = smarty_modifier_date_format($_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate()->format('d-m-Y'),"%d/%m/%Y") ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['checkOutDate'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = sprintf("%.2f",$_smarty_tpl->tpl_vars['booking']->value->getTotalPrice()) ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
 €</td>
                            <td>
                                <?php if ((($tmp = $_smarty_tpl->tpl_vars['booking']->value->getCancellation() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['cancelled'] ?? null : $tmp)) {?>
                                    <span class="status-cancelled">Cancellata</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate() < smarty_modifier_date_format(time(),"%Y-%m-%d")) {?>
                                    <span class="status-completed">Completata</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['booking']->value->getCheckInDate() <= smarty_modifier_date_format(time(),"%Y-%m-%d") && $_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate() >= smarty_modifier_date_format(time(),"%Y-%m-%d")) {?>
                                    <span class="status-active">Attiva</span>
                                <?php } else { ?>
                                    <span class="status-upcoming">In Arrivo</span>
                                <?php }?>
                            </td>
                            <td>
                                <?php if (!(($tmp = $_smarty_tpl->tpl_vars['booking']->value->getCancellation() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['cancelled'] ?? null : $tmp) && $_smarty_tpl->tpl_vars['booking']->value->getCheckInDate() > smarty_modifier_date_format(time(),"%Y-%m-%d")) {?>
                                                                        <form action="/albergoPulito/public/User/deleteBooking/<?php echo $_smarty_tpl->tpl_vars['booking']->value->getId();?>
" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="idBooking" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['booking']->value->getId() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['booking']->value['idBooking'] ?? null : $tmp);?>
">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler cancellare questa prenotazione?');">Cancella</button>
                                    </form>
                                <?php } else { ?>
                                    Nessuna azione disponibile
                                <?php }?>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-info" role="alert">
            Non hai ancora effettuato nessuna prenotazione. <a href="albergoPulito/public/User/showAccountDetails">Esplora le nostre camere!</a>
        </div>
    <?php }?>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}

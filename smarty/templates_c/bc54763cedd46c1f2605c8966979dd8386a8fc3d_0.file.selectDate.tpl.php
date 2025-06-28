<?php
/* Smarty version 4.3.2, created on 2025-06-28 12:39:53
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\selectDate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fc6796f5873_32864525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc54763cedd46c1f2605c8966979dd8386a8fc3d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\selectDate.tpl',
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
function content_685fc6796f5873_32864525 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'select date'), 0, false);
?>

<section id="booking-form" class="container section-padding">
    <h2>Prenota il Tuo Soggiorno</h2>
    <form action="<?php if ($_smarty_tpl->tpl_vars['idOffer']->value !== null) {?>/albergoPulito/public/Booking/getAvailableRoomsBySpecialOffer/<?php echo $_smarty_tpl->tpl_vars['idOffer']->value;
} else { ?>/albergoPulito/public/Booking/getAvailableRooms<?php }?>" method="POST" class="form-grid">
        <div class="form-group">
            <label for="check-in">Data Check-in:</label>
            <input type="date" id="check-in" name="data_check_in" required>
        </div>
        <div class="form-group">
            <label for="check-out">Data Check-out:</label>
            <input type="date" id="check-out" name="data_check_out" required>
        </div>
        <div class="form-group">
            <label for="num-adults">Adulti:</label>
            <input type="number" id="num-adults" name="num_adulti" min="1" value="1" required>
        </div>

        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Cerca camere</button>
        </div>
    </form>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

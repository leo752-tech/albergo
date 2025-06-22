<?php
/* Smarty version 4.3.2, created on 2025-06-22 15:25:16
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showInsertBooking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6858043cc83371_08421835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d5b9ea0d573d4aaa16ff190ae8be73a2d2779c9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showInsertBooking.tpl',
      1 => 1750598711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6858043cc83371_08421835 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Prenotazione</h2>

   

    <div class="form-grid">
        <form action="/albergoPulito/public/Admin/insertBooking" method="POST">
            <div class="form-group">
                <label for="idUser">Utente:</label>
                                <select class="form-control" id="idUser" name="idUser" required>
                    <option value="">Seleziona un utente</option>
                    <?php if (!empty($_smarty_tpl->tpl_vars['usersList']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usersList']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                            <option value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getIdUser() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['idUser'] ?? null : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['formData']->value['idUser'] == ((($tmp = $_smarty_tpl->tpl_vars['user']->value->getIdUser() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['idUser'] ?? null : $tmp))) {?>selected<?php }?>>
                                <?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getFirstName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['firstName'] ?? null : $tmp);?>
 <?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getLastName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['lastName'] ?? null : $tmp);?>
 (ID: <?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getIdUser() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['idUser'] ?? null : $tmp);?>
)
                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label for="idRoom">Camera:</label>
                                <select class="form-control" id="idRoom" name="idRoom" required>
                    <option value="">Seleziona una camera</option>
                    <?php if (!empty($_smarty_tpl->tpl_vars['roomsList']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roomsList']->value, 'room');
$_smarty_tpl->tpl_vars['room']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->do_else = false;
?>
                            <option value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getIdCamera() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['room']->value['idCamera'] ?? null : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['formData']->value['idRoom'] == ((($tmp = $_smarty_tpl->tpl_vars['room']->value->getIdCamera() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['room']->value['idCamera'] ?? null : $tmp))) {?>selected<?php }?>>
                                <?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['room']->value['name'] ?? null : $tmp);?>
 (ID: <?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getIdCamera() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['room']->value['idCamera'] ?? null : $tmp);?>
, Posti: <?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getBeds() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['room']->value['beds'] ?? null : $tmp);?>
)
                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label for="checkInDate">Data Check-in:</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['checkInDate'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>

            <div class="form-group">
                <label for="checkOutDate">Data Check-out:</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['checkOutDate'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            
            <div class="form-group">
                <label for="idSpecialOffer">Offerta Speciale (Opzionale):</label>
                                <select class="form-control" id="idSpecialOffer" name="idSpecialOffer">
                    <option value="">Nessuna Offerta</option>
                    <?php if (!empty($_smarty_tpl->tpl_vars['offersList']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offersList']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                            <option value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['offer']->value->getIdOffer() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['offer']->value['idOffer'] ?? null : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['formData']->value['idSpecialOffer'] == ((($tmp = $_smarty_tpl->tpl_vars['offer']->value->getIdOffer() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['offer']->value['idOffer'] ?? null : $tmp))) {?>selected<?php }?>>
                                <?php echo (($tmp = $_smarty_tpl->tpl_vars['offer']->value->getName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['offer']->value['name'] ?? null : $tmp);?>
 (<?php echo (($tmp = $_smarty_tpl->tpl_vars['offer']->value->getDiscount() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['offer']->value['discount'] ?? null : $tmp);?>
% di sconto)
                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </select>
            </div>

                        
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Prenotazione</button>
                <a href="/albergoPulito/public/Admin/bookings.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

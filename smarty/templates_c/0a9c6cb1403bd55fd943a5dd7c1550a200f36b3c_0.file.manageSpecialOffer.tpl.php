<?php
/* Smarty version 4.3.2, created on 2025-06-20 22:50:24
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\manageSpecialOffer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6855c99082fd51_34188335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a9c6cb1403bd55fd943a5dd7c1550a200f36b3c' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\manageSpecialOffer.tpl',
      1 => 1750452619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6855c99082fd51_34188335 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Gestione OfferteSpeciali</h2>

<a href="/hotel_reservation/admin/add_room.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Camera</a>


<table class="admin-table">
    <thead>
        <tr>
            <th>ID OfferteSpeciali</th>      <th>Nome</th>          <th>Descrizione</th>          <th>Posti Letto</th>          <th>Durata</th>   <th>Prezzo Totale</th>          <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['specialOffers']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['specialOffers']->value, 'specialOffer');
$_smarty_tpl->tpl_vars['specialOffer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['specialOffer']->value) {
$_smarty_tpl->tpl_vars['specialOffer']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getIdSpecialOffer();?>
</td>           <td><?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getTitle();?>
</td>         <td><?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getDescription();?>
</td>           <td><?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getBeds();?>
</td>       <td><?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getLength();?>
</td>        <td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['specialOffer']->value->getSpecialPrice());?>
 €</td>          <td>
                    <a href="/~momok/Booking/getAvailableRoomsBySpecialOffer/<?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getIdSpecialOffer();?>
" class="btn btn-sm btn-primary">Vai</a>
                    <a href="/~momok/Admin/deleteRoom/<?php echo $_smarty_tpl->tpl_vars['specialOffer']->value->getIdSpecialOffer();?>
" class="btn btn-sm btn-danger">Elimina</a>
                </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <tr>
                <td colspan="6">Nessuna camera trovata.</td>
            </tr>
        <?php }?>
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

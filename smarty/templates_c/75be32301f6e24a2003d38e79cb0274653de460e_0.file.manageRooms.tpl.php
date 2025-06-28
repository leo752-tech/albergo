<?php
/* Smarty version 4.3.2, created on 2025-06-28 12:33:02
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageRooms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fc4de6c4146_35916301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75be32301f6e24a2003d38e79cb0274653de460e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageRooms.tpl',
      1 => 1751106746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fc4de6c4146_35916301 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'manage Rooms'), 0, false);
?>

<h2>Gestione Camere</h2>

<a href="/albergoPulito/public/Admin/showInsertRoom" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Camera</a>


<table class="admin-table">
    <thead>
        <tr>
            <th>ID Camera</th>      <th>Nome</th>          <th>Posti Letto</th>   <th>Prezzo Notte</th>  <th>Tipo</th>     <th>Descrizione</th>          <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['rooms']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'room');
$_smarty_tpl->tpl_vars['room']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
</td>           <td><?php echo $_smarty_tpl->tpl_vars['room']->value->getName();?>
</td>         <td><?php echo $_smarty_tpl->tpl_vars['room']->value->getBeds();?>
</td>         <td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['room']->value->getPrice());?>
 €</td> <td><?php echo $_smarty_tpl->tpl_vars['room']->value->getType();?>
</td>  <td><?php echo $_smarty_tpl->tpl_vars['room']->value->getDescription();?>
</td>        <td>
                    <a href="/albergoPulito/public/Admin/showUpdateRoom/<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
" class="btn btn-sm btn-primary">Modifica</a>
                    <a href="/albergoPulito/public/Admin/deleteRoom/<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
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

<?php
/* Smarty version 4.3.2, created on 2025-06-20 12:13:52
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\manageUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68553460f3a999_68849151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2adfc068abc08224193b0753a708227de913d648' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\manageUsers.tpl',
      1 => 1750413895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_68553460f3a999_68849151 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Gestione Utenti'), 0, false);
?>

<h2>Gestione Utenti</h2>



<a href="/~momok/Admin/showInsertUser" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data di Nascita</th>
            <th>Luogo di Nascita</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFirstName();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getLastName();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getBirthDate()->format('Y-m-d');?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getBirthPlace();?>
</td>
            <td>
                <a href="/~momok/Admin/showUpdateUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
" class="btn btn-sm btn-primary">Modifica</a>
                <a href="/~momok/Admin/deleteUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
" class="btn btn-sm btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
}
if ($_smarty_tpl->tpl_vars['user']->do_else) {
?>
        <tr>
            <td colspan="6">Nessun utente trovato.</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

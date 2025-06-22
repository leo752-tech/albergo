<?php
/* Smarty version 4.3.2, created on 2025-06-22 21:44:36
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68585d240f9777_17427158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7e5e73a3756c4504540d3c7176a69bb3096b5d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageUsers.tpl',
      1 => 1750621005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_68585d240f9777_17427158 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Gestione Utenti'), 0, false);
?>

<h2>Gestione Utenti</h2>



<a href="/albergoPulito/public/Admin/showInsertUser" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente</a>

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
                <a href="/albergoPulito/public/Admin/showUpdateUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
" class="btn btn-sm btn-primary">Modifica</a>
                <a href="/albergoPulito/public/Admin/deleteUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
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

<div class="container">
    <h2>Utenti Registrati</h2>

    <a href="/albergoPulito/public/Admin/showInsertRegisteredUser" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente Registrato</a>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID UTENTE</th>
                    <th>NOME</th>
                    <th>COGNOME</th>
                    <th>EMAIL</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                                <?php if (!empty($_smarty_tpl->tpl_vars['registeredUsers']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['registeredUsers']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                        <tr>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getIdRegisteredUser() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['idUser'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getFirstName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['firstName'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getLastName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['lastName'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getEmail() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['email'] ?? null : $tmp);?>
</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdateRegisteredUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdRegisteredUser();?>
" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/banRegisteredUser/<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdRegisteredUser();?>
" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idUser">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo utente? Tutte le sue prenotazioni saranno cancellate.');">Banna</button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Nessun utente registrato trovato o nessun utente con prenotazioni.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

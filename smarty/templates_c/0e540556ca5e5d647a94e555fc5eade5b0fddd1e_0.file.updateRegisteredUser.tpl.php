<?php
/* Smarty version 4.3.2, created on 2025-06-28 10:37:59
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateRegisteredUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fa9e74556a0_94897127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e540556ca5e5d647a94e555fc5eade5b0fddd1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateRegisteredUser.tpl',
      1 => 1751031805,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fa9e74556a0_94897127 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Inserisci un utente'), 0, false);
?>

<div class="container">
    <h2>Aggiorna account</h2>

    

    <form action="/albergoPulito/public/Admin/updateRegisteredUser" method="post">
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getFirstName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getLastName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getBirthDate()->format('d-m-Y') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getBirthPlace() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getEmail() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Utente</button>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

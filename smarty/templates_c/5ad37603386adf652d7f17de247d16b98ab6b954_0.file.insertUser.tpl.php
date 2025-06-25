<?php
/* Smarty version 4.3.2, created on 2025-06-25 17:28:00
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685c15805c9b78_64853402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ad37603386adf652d7f17de247d16b98ab6b954' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertUser.tpl',
      1 => 1750588465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685c15805c9b78_64853402 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Inserisci un utente'), 0, false);
?>

<div class="container">
    <h2>Inserisci un utente</h2>

    

    <form action="/albergoPulito/public/Admin/insertUser" method="post">
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['firstName']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lastName']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['birthDate']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['birthPlace']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Utente</button>
        <a href="users.php" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

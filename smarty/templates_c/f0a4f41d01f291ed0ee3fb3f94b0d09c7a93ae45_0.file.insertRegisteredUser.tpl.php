<?php
/* Smarty version 4.3.2, created on 2025-06-25 17:28:36
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertRegisteredUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685c15a412b919_32125272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a4f41d01f291ed0ee3fb3f94b0d09c7a93ae45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertRegisteredUser.tpl',
      1 => 1750620501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685c15a412b919_32125272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Inserisci un utente'), 0, false);
?>

<div class="container">
    <h2>Inserisci un utente con account</h2>

    

    <form action="/albergoPulito/public/Admin/insertRegisteredUser" method="post">
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
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Utente</button>
        <a href="/albergoPulito/public" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php
/* Smarty version 4.3.2, created on 2025-06-28 10:11:43
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fa3bf9d9f01_05034925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb2097982ce43015d67c3418a9277b9b11ee7db6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateUser.tpl',
      1 => 1751042257,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fa3bf9d9f01_05034925 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiorna i dati dell'utente</h2>

    

    <form action="/albergoPulito/public/Admin/updateUser" method="post">
        <input type="hidden" name="idUser" >
        
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
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

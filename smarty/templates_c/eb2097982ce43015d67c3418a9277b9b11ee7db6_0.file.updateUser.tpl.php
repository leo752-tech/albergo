<?php
/* Smarty version 4.3.2, created on 2025-06-25 17:30:16
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685c1608648f88_61122019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb2097982ce43015d67c3418a9277b9b11ee7db6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateUser.tpl',
      1 => 1750623895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685c1608648f88_61122019 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiorna i dati dell'utente</h2>

    

    <form action="/albergoPulito/public/Admin/updateUser" method="post">
        <input type="hidden" name="idUser" >
        
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate">
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace">
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

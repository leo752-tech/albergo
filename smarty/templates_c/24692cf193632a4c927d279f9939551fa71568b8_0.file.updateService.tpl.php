<?php
/* Smarty version 4.3.2, created on 2025-06-23 00:44:45
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6858875d8fd232_77795728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24692cf193632a4c927d279f9939551fa71568b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateService.tpl',
      1 => 1750631819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6858875d8fd232_77795728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3>Aggiungi Nuovo Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/updateService" method="POST">
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" min="0">
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            </div>
        </form>
    </div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

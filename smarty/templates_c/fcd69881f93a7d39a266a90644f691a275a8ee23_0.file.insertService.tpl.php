<?php
/* Smarty version 4.3.2, created on 2025-06-28 15:40:54
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ff0e60ade27_81800208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd69881f93a7d39a266a90644f691a275a8ee23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertService.tpl',
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
function content_685ff0e60ade27_81800208 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'insert Service'), 0, false);
?>

<h3>Aggiungi Nuovo Servizio</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/insertService" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nome Servizio:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prezzo (€):</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" min="0">
        </div>
        <div class="form-group full-width">
            <label for="service_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="service_image" name="pathImage" accept="image/*">
            <small class="form-text text-muted">Carica un'immagine per il servizio.</small>
        </div>
        <div class="form-group full-width">
            <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            <a href="/albergoPulito/public/Admin/manageExtraServices" class="btn btn-secondary">Annulla</a>
        </div>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

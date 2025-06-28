<?php
/* Smarty version 4.3.2, created on 2025-06-28 12:26:56
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fc370b1bd90_54325474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24692cf193632a4c927d279f9939551fa71568b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateService.tpl',
      1 => 1751106375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fc370b1bd90_54325474 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3>Modifica Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/updateService" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getDescription() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"  rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getPrice() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"  min="0">
            </div>
            <div class="form-group full-width">
                <label for="service_image">Immagine Servizio:</label> 
                <input type="file" class="form-control-file" id="service_image" name="pathImage" accept="image/*">
                <small class="form-text text-muted">Carica un'immagine per il servizio.</small>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            </div>
        </form>
    </div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

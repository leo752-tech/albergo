<?php
/* Smarty version 4.3.2, created on 2025-06-28 15:40:25
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateOffer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ff0c9089163_25708728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f791828ca3c9089aa57b8f441199657b3033303' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateOffer.tpl',
      1 => 1751108589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685ff0c9089163_25708728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3>Modifica Politica di Prezzo / Offerta</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/updateOffer" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="policyName">Nome Politica/Offerta:</label>
            <input type="text" class="form-control" id="policyName" name="title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['policyName'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>             <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="length">Notti Minime :</label>
            <input type="number" class="form-control" id="length" name="length" min="0">
        </div>
        <div class="form-group full-width">
            <label for="specialPrice">Prezzo:</label> 
            <input type="number" class="form-control" id="specialPrice" name="specialPrice" min="0">
        </div>
        
        <div class="form-group full-width">
            <label for="offer_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="offer_image" name="pathImage" accept="image/*" required>
            <small class="form-text text-muted">Carica un'immagine per l'offerta.</small>
        </div>
        
        <div class="form-group full-width">
            <button type="submit" class="btn btn-success">Aggiungi Politica</button>
            <a href="/albergoPulito/public/Admin/manageSpecialOffer" class="btn btn-secondary">Annulla</a> 
        </div>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

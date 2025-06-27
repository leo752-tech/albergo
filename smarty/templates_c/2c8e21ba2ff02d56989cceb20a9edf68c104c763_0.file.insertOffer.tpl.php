<?php
/* Smarty version 4.3.2, created on 2025-06-27 17:53:48
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertOffer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ebe8cf0ba96_78395325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8e21ba2ff02d56989cceb20a9edf68c104c763' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertOffer.tpl',
      1 => 1751039624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685ebe8cf0ba96_78395325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/insertOffer" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="policyName">Nome Politica/Offerta:</label>
            <input type="text" class="form-control" id="policyName" name="title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['policyName'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>             <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="beds">Numero di posti letto:</label>
            <input type="number" class="form-control" id="beds" name="beds" min="0">
        </div>
        <div class="form-group">
            <label for="length">Notti Minime (Opzionale):</label>
            <input type="number" class="form-control" id="length" name="length" min="0">
        </div>
        <div class="form-group full-width">
            <label for="specialPrice">Prezzo:</label> 
            <input type="number" class="form-control" id="specialPrice" name="specialPrice" min="0">
        </div>
        
        <div class="form-group full-width">
            <label for="offer_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="offer_image" name="pathImage" accept="image/*">
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

<?php
/* Smarty version 4.3.2, created on 2025-06-27 17:44:35
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ebc63aee948_42535563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e0c7e8f82a0e55e240548b7c2e3f6f934816133' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertRoom.tpl',
      1 => 1751039071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685ebc63aee948_42535563 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

    <div class="form-grid">
        <form action="/albergoPulito/public/Admin/insertOffer" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Camera:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            
            <div class="form-group">
                <label for="beds">Posti Letto:</label>
                <input type="number" class="form-control" id="beds" name="beds" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['beds'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required min="1">
            </div>
            
            <div class="form-group">
                <label for="price">Prezzo Notte (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['price'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required min="0">
            </div>
            
            <div class="form-group">
                <label for="type">Tipo:</label>                 <input type="text" class="form-control" id="type" name="type" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['type'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
            </div>

            <div class="form-group full-width">
                <label for="room_images">Immagini Camera:</label> 
                <input type="file" class="form-control-file" id="room_images" name="room_images[]" accept="image/*" multiple>
                <small class="form-text text-muted">Carica una o più immagini per la camera. Puoi visualizzarle e rimuoverle prima di salvare.</small>
                
                <hr>
                <div id="image_preview_container" class="image-preview-grid">
                    
                </div>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Offerta</button>
                <a href="/albergoPulito/public/Admin/manageSpecialOffer" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

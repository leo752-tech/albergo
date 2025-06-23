<?php
/* Smarty version 4.3.2, created on 2025-06-23 22:50:00
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\insertRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6859bdf814d4b4_29976111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e0c7e8f82a0e55e240548b7c2e3f6f934816133' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\insertRoom.tpl',
      1 => 1750627092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6859bdf814d4b4_29976111 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

   

    <div class="form-grid">
                <form action="/albergoPulito/public/Admin/insertRoom" method="POST" enctype="multipart/form-data">
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
                <label for="name">Tipo:</label>
                <input type="text" class="form-control" id="name" name="type" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['type'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
            </div>

           <div class="form-group full-width">
    <label for="room_images">Immagini Camera (Seleziona più file):</label>

    <input type="file" class="form-control-file" id="room_images" name="room_images[]" accept="image/*" multiple>

    <small class="form-text text-muted">Carica una o più immagini per la camera. Puoi visualizzarle e rimuoverle prima di salvare.</small>

    <hr>
    <div id="image_preview_container" class="image-preview-grid">
        </div>
</div> <link rel="stylesheet" href="/albergoPulito/public/assets/css/manageFile.css">

<?php echo '<script'; ?>
 src="/albergoPulito/public/assets/js/manageFile.js" defer><?php echo '</script'; ?>
>

            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Camera</button>
                <a href="/albergoPulito/public/Admin/manageRooms" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

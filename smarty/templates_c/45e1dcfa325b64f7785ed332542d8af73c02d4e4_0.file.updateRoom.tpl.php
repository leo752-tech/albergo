<?php
/* Smarty version 4.3.2, created on 2025-06-23 22:59:47
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6859c04398f192_92109022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45e1dcfa325b64f7785ed332542d8af73c02d4e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateRoom.tpl',
      1 => 1750624925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6859c04398f192_92109022 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

   

    <div class="form-grid">
                <form action="/albergoPulito/public/Admin/updateRoom" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Camera:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="form-group">
                <label for="beds">Posti Letto:</label>
                <input type="number" class="form-control" id="beds" name="beds">
            </div>
            
            <div class="form-group">
                <label for="price">Prezzo Notte (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price">
            </div>
            
            <div class="form-group">
                <label for="name">Tipo:</label>
                <input type="text" class="form-control" id="name" name="type">
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione:</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
            </div>

                        <div class="form-group full-width">
                <label for="room_images">Immagini Camera (Seleziona più file):</label>
                                                <input type="file" class="form-control-file" id="room_images" name="room_images[]" accept="image/*" multiple>
                <small class="form-text text-muted">Carica una o più immagini per la camera.</small>
            </div>

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

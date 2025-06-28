<?php
/* Smarty version 4.3.2, created on 2025-06-28 10:57:26
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showUpdateRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fae765962a5_62739803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75e9d246fb651113e48d1b227d401b50b481b1bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showUpdateRoom.tpl',
      1 => 1751049088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fae765962a5_62739803 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

   

    <div class="form-grid">
                <form action="/albergoPulito/public/Admin/updateRoom" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Camera:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            </div>
            
            <div class="form-group">
                <label for="beds">Posti Letto:</label>
                <input type="number" class="form-control" id="beds" name="beds" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getBeds() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" min="1">
            </div>
            
            <div class="form-group">
                <label for="price">Prezzo Notte (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getPrice() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" min="0">
            </div>
            
            <div class="form-group">
                <label for="name">Tipo:</label>
                <input type="text" class="form-control" id="name" name="type" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getType() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione :</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value->getDescription() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
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
                <button type="submit" class="btn btn-success">Aggiorna Camera</button>
                <a href="/albergoPulito/public/Admin/manageRooms" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

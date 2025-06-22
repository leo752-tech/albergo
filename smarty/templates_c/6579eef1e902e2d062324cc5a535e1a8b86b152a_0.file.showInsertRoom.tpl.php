<?php
/* Smarty version 4.3.2, created on 2025-06-21 15:26:30
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\showInsertRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6856b306a7c307_56680672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6579eef1e902e2d062324cc5a535e1a8b86b152a' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\showInsertRoom.tpl',
      1 => 1750511865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6856b306a7c307_56680672 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

   

    <div class="form-grid">
                <form action="/~momok/Admin/insertRoom" method="POST" enctype="multipart/form-data">
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
                <label for="type">Tipo:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="">Seleziona un tipo</option>
                    <option value="Singola" <?php if ($_smarty_tpl->tpl_vars['formData']->value['type'] == 'Singola') {?>selected<?php }?>>Singola</option>
                    <option value="Doppia" <?php if ($_smarty_tpl->tpl_vars['formData']->value['type'] == 'Doppia') {?>selected<?php }?>>Doppia</option>
                    <option value="Suite" <?php if ($_smarty_tpl->tpl_vars['formData']->value['type'] == 'Suite') {?>selected<?php }?>>Suite</option>
                  
                </select>
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/rooms.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

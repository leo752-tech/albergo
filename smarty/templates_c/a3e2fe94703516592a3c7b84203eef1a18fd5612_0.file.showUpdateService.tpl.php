<?php
/* Smarty version 4.3.2, created on 2025-06-22 18:34:55
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showUpdateService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685830afbb5f73_43550148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3e2fe94703516592a3c7b84203eef1a18fd5612' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showUpdateService.tpl',
      1 => 1750609718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685830afbb5f73_43550148 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3>Aggiungi Nuovo Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/updateService" method="POST">
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['price'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" min="0">
            </div>
            <div class="form-group">
                <label for="available">Disponibile:</label>
                <select class="form-control" id="available" name="available" required>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['formData']->value['available'] == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['formData']->value['available'] == 0) {?>selected<?php }?>>No</option>
                </select>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            </div>
        </form>
    </div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

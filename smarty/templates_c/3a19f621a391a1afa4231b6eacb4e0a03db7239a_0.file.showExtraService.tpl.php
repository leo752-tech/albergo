<?php
/* Smarty version 4.3.2, created on 2025-06-22 18:33:41
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showExtraService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68583065667fc2_97478037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a19f621a391a1afa4231b6eacb4e0a03db7239a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showExtraService.tpl',
      1 => 1750609621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_68583065667fc2_97478037 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Gestione Servizi</h2>


    <h3>Aggiungi Nuovo Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/insertService" method="POST">
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

    <h3>Servizi Esistenti</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIZIONE</th>
                    <th>PREZZO</th>
                    <th>DISPONIBILE</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                                <?php if (!empty($_smarty_tpl->tpl_vars['services']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                        <tr>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getId() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['service']->value['idService'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getName() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['service']->value['name'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getDescription() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['service']->value['description'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = sprintf("%.2f",$_smarty_tpl->tpl_vars['service']->value->getPrice()) ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
 €</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdateService/<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteService" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idService" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['service']->value->getId() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['service']->value['idService'] ?? null : $tmp);?>
">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo servizio?');">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Nessun servizio registrato.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

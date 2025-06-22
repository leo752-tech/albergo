<?php
/* Smarty version 4.3.2, created on 2025-06-22 19:12:44
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageOffers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6858398c54eff4_32251318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11173ddd1c4ae7e2d3aeb3177b43e83c8281dc16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageOffers.tpl',
      1 => 1750612361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6858398c54eff4_32251318 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Gestione Politiche di Prezzo</h2>

    

    <h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/showInsertOffer" method="POST">
            <div class="form-group">
                <label for="policyName">Nome Politica/Offerta:</label>
                <input type="text" class="form-control" id="policyName" name="policyName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['policyName'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            <div class="form-group">
                <label for="discountType">Tipo di Sconto:</label>
                <select class="form-control" id="discountType" name="discountType" required>
                    <option value="">Seleziona tipo</option>
                    <option value="percentage" <?php if ($_smarty_tpl->tpl_vars['formData']->value['discountType'] == 'percentage') {?>selected<?php }?>>Percentuale (%)</option>
                    <option value="fixed_amount" <?php if ($_smarty_tpl->tpl_vars['formData']->value['discountType'] == 'fixed_amount') {?>selected<?php }?>>Importo Fisso (€)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discountValue">Valore Sconto:</label>
                <input type="number" step="0.01" class="form-control" id="discountValue" name="discountValue" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['discountValue'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required min="0">
            </div>
            <div class="form-group">
                <label for="startDate">Data Inizio:</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['startDate'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            <div class="form-group">
                <label for="endDate">Data Fine:</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['endDate'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            <div class="form-group">
                <label for="minNights">Notti Minime (Opzionale):</label>
                <input type="number" class="form-control" id="minNights" name="minNights" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['minNights'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" min="0">
            </div>
            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Politica</button>
            </div>
        </form>
    </div>

    <h3>Politiche di Prezzo Esistenti</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIZIONE</th>
                    <th>PREZZO</th>
                    <th>MIN. NOTTI</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                                <?php if (!empty($_smarty_tpl->tpl_vars['policies']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['policies']->value, 'policy');
$_smarty_tpl->tpl_vars['policy']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['policy']->value) {
$_smarty_tpl->tpl_vars['policy']->do_else = false;
?>
                        <tr>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getIdSpecialOffer() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['idPolicy'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getTitle() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['title'] ?? null : $tmp);?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getDescription() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['description'] ?? null : $tmp);?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['policy']->value->getDescription() == 'percentage') {?>
                                    <?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getDescription() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['discountValue'] ?? null : $tmp);?>
%
                                <?php } else { ?>
                                    <?php echo (($tmp = sprintf("%.2f",$_smarty_tpl->tpl_vars['policy']->value->getDescription()) ?? null)===null||$tmp==='' ? '0.00' ?? null : $tmp);?>
 €
                                <?php }?>
                            </td>
                           <td><?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getLength() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['length'] ?? null : $tmp) ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdate<?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getIdSpecialOffer() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['idPolicy'] ?? null : $tmp);?>
" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteOffer" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idPolicy" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['policy']->value->getIdSpecialOffer() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['policy']->value['idPolicy'] ?? null : $tmp);?>
">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa politica di prezzo?');">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">Nessuna politica di prezzo o offerta registrata.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

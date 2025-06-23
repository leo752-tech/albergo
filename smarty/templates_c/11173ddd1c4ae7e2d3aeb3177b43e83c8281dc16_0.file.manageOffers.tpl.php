<?php
/* Smarty version 4.3.2, created on 2025-06-23 21:21:06
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageOffers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6859a922b83984_53352760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11173ddd1c4ae7e2d3aeb3177b43e83c8281dc16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageOffers.tpl',
      1 => 1750633160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_6859a922b83984_53352760 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h2>Gestione Politiche di Prezzo</h2>

    

    <h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/insertOffer" method="POST">
            <div class="form-group">
                <label for="policyName">Nome Politica/Offerta:</label>
                <input type="text" class="form-control" id="policyName" name="title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['formData']->value['policyName'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
            </div>
            <div class="form-group">
                <label for="Description">Descrizione:</label>
                <input type="text" class="form-control" id="Descrizione" name="description" required>
            </div>
            <div class="form-group">
                <label for="minNights">Numero di posti letto:</label>
                <input type="number" class="form-control" id="beds" name="beds" min="0">
            </div>
            <div class="form-group">
                <label for="minNights">Notti Minime (Opzionale):</label>
                <input type="number" class="form-control" id="length" name="length" min="0">
            </div>
            <div class="form-group full-width">
                <label for="price">Prezzo:</label>
                <input type="number" class="form-control" id="specialPrice" name="specialPrice" min="0">
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
                                <a href="/albergoPulito/public/Admin/showUpdate<?php echo $_smarty_tpl->tpl_vars['policy']->value->getIdSpecialOffer();?>
" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteOffer" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idPolicy" value="<?php echo $_smarty_tpl->tpl_vars['policy']->value->getIdSpecialOffer();?>
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

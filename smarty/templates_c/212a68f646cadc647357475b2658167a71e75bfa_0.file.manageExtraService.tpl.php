<?php
/* Smarty version 4.3.2, created on 2025-06-28 12:37:54
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageExtraService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fc602074934_46221427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '212a68f646cadc647357475b2658167a71e75bfa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageExtraService.tpl',
      1 => 1751106746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fc602074934_46221427 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'manage extraservice'), 0, false);
?>

<div class="container">
    <h2>Gestione Servizi</h2>


    <a href="/albergoPulito/public/Admin/showInsertService" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Servizio</a>


    <h3>Servizi Esistenti</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIZIONE</th>
                    <th>PREZZO</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['service']->value->getName();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['service']->value->getDescription();?>
</td>
                            <td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['service']->value->getPrice());?>
 €</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdateService/<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteService/<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idService" value="<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
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

<?php
/* Smarty version 4.3.2, created on 2025-06-19 23:02:03
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\updateUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68547acb106e65_17977320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c389024186428ce711072e417b58a81633fd920' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\updateUser.tpl',
      1 => 1750366918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_68547acb106e65_17977320 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>$_smarty_tpl->tpl_vars['pageTitle']->value), 0, false);
?>

<div class="container">
    <h2><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h2>

    <?php if ($_smarty_tpl->tpl_vars['errorMessage']->value) {?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>

        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['successMessage']->value) {?>
        <div class="alert alert-success" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>

        </div>
    <?php }?>

    <form action="/~momok/Admin/updateUser" method="post">
        <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['idUser']->value;?>
">
        
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" required>
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="/~momok/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

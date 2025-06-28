<?php
/* Smarty version 4.3.2, created on 2025-06-28 14:25:48
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showExtraService.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fdf4c6bbbf9_08651807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a19f621a391a1afa4231b6eacb4e0a03db7239a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showExtraService.tpl',
      1 => 1751106746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685fdf4c6bbbf9_08651807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'show extraservice'), 0, false);
?>


    <section class="section-padding">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px; color: #007bff;">I Nostri Servizi Extra</h2>

            <?php if (!empty($_smarty_tpl->tpl_vars['services']->value)) {?>
                <div class="services-list">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services']->value, 'servizio');
$_smarty_tpl->tpl_vars['servizio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['servizio']->value) {
$_smarty_tpl->tpl_vars['servizio']->do_else = false;
?>
                        <div class="service-card" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 25px; overflow: hidden;">
                            
                                                                                    <?php if (!empty($_smarty_tpl->tpl_vars['servizio']->value->getPathImage())) {?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['servizio']->value->getPathImage();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['servizio']->value->getName();?>
" style="width: 100%; height: 200px; object-fit: cover;">
                            <?php }?>
                            
                            <div class="service-content" style="padding: 20px;">
                                <div class="service-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <h3 style="margin: 0; color: #333;"><?php echo $_smarty_tpl->tpl_vars['servizio']->value->getName();?>
</h3>
                                    <span class="service-price" style="font-size: 1.2em; font-weight: bold; color: #007bff; white-space: nowrap; margin-left: 15px;">
                                        €<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['servizio']->value->getPrice());?>

                                    </span>
                                </div>
                                
                                <div class="service-body">
                                    <p style="color: #666; margin: 0;"><?php echo $_smarty_tpl->tpl_vars['servizio']->value->getDescription();?>
</p>
                                </div>
                            </div>

                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>

            <?php } else { ?>
                <div class="alert alert-warning" style="text-align: center;">
                    <p>Al momento non sono disponibili servizi extra.</p>
                    <a href="/" class="btn btn-primary">Torna alla Home</a>
                </div>
            <?php }?>
        </div>
    </section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

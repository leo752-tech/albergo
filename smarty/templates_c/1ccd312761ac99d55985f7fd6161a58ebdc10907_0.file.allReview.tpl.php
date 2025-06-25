<?php
/* Smarty version 4.3.2, created on 2025-06-25 16:19:29
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\allReview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685c0571759e16_94533736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ccd312761ac99d55985f7fd6161a58ebdc10907' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\allReview.tpl',
      1 => 1750860707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685c0571759e16_94533736 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Tutte le Recensioni dei Clienti</h2>

<?php if (!empty($_smarty_tpl->tpl_vars['allReviews']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allReviews']->value, 'review');
$_smarty_tpl->tpl_vars['review']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->do_else = false;
?>
        <div class="review-card">
            <div class="review-header">
                <h3><?php echo $_smarty_tpl->tpl_vars['review']->value[0]->getTitle();?>
</h3>
                <span class="review-date"><?php echo $_smarty_tpl->tpl_vars['review']->value[0]->getDate()->format('d/m/Y H:i');?>
</span>
            </div>
            <div class="review-meta">
                                <p>Lasciata da: <strong><?php echo (($tmp = $_smarty_tpl->tpl_vars['review']->value[1] ?? null)===null||$tmp==='' ? 'Utente Sconosciuto' ?? null : $tmp);?>
</strong></p>
                <div class="rating-display">
                    Valutazione: <?php echo $_smarty_tpl->tpl_vars['review']->value[0]->getRating();?>
 / 5
                                                        </div>
            </div>
            <div class="review-description">
                <p><?php echo $_smarty_tpl->tpl_vars['review']->value[0]->getDescription();?>
</p>
            </div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
    <p>Non ci sono ancora recensioni disponibili.</p>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

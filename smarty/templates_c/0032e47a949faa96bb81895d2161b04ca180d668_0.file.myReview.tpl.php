<?php
/* Smarty version 4.3.2, created on 2025-06-28 14:43:58
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\myReview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fe38e367597_36266482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0032e47a949faa96bb81895d2161b04ca180d668' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\myReview.tpl',
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
function content_685fe38e367597_36266482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'my review'), 0, false);
?>

<?php if (!empty($_smarty_tpl->tpl_vars['reviews']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviews']->value, 'review');
$_smarty_tpl->tpl_vars['review']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->do_else = false;
?>
        <div class="review-card">
            <div class="review-header">
                <h3><?php echo $_smarty_tpl->tpl_vars['review']->value->getTitle();?>
</h3>
                <span class="review-date"><?php echo $_smarty_tpl->tpl_vars['review']->value->getDate()->format('d/m/Y');?>
</span>
            </div>
            <div class="review-rating">
                                Valutazione: <?php echo $_smarty_tpl->tpl_vars['review']->value->getRating();?>
 / 5
                                            </div>
            <div class="review-description">
                <p><?php echo $_smarty_tpl->tpl_vars['review']->value->getDescription();?>
</p>
            </div>
            <div class="review-actions">
                                <a href="/albergoPulito/public/User/deleteReview/<?php echo $_smarty_tpl->tpl_vars['review']->value->getId();?>
" class="btn btn-delete" onclick="return confirm('Sei sicuro di voler eliminare questa recensione?');">Elimina</a>
            </div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
    <p>Non hai ancora lasciato alcuna recensione.</p>
<?php }?>

<div class="create-review-section">
    <a href="/albergoPulito/public/User/showSetReview" class="btn btn-primary">Scrivi una Nuova Recensione</a>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

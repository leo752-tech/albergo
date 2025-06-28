<?php
/* Smarty version 4.3.2, created on 2025-06-28 13:03:18
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\showOffer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fcbf6c92eb2_07278535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51da3df59a13631518dabe7ee72e1c8dbadb4312' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\showOffer.tpl',
      1 => 1751108527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685fcbf6c92eb2_07278535 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'show offer'), 0, false);
?>
        <section class="section-padding">
            <div class="container">
                <h2 style="text-align: center; margin-bottom: 40px; color: #007bff;">Le Nostre Offerte Speciali</h2>

                <?php if (!empty($_smarty_tpl->tpl_vars['specialOffer']->value)) {?>
                    <div class="rooms-grid">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['specialOffer']->value, 'offerta');
$_smarty_tpl->tpl_vars['offerta']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offerta']->value) {
$_smarty_tpl->tpl_vars['offerta']->do_else = false;
?>
                            <div class="room-card special-offer-card">
                                <?php if (!empty($_smarty_tpl->tpl_vars['offerta']->value->getPathImage())) {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['offerta']->value->getPathImage();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['offerta']->value->getTitle();?>
">
                                <?php } else { ?>
                                    <img src="/path/to/default_offer_image.jpg" alt="Immagine offerta non disponibile">
                                <?php }?>
                                <h4><?php echo $_smarty_tpl->tpl_vars['offerta']->value->getTitle();?>
</h4>
                                <p><?php echo $_smarty_tpl->tpl_vars['offerta']->value->getDescription();?>
</p>
                                <div class="offer-details">
                                    <p>Durata Soggiorno: <strong><?php echo $_smarty_tpl->tpl_vars['offerta']->value->getLength();?>
 notti</strong></p>
                                </div>
                                <div class="room-price">
                                    Prezzo Speciale: <span class="offer-price">€<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['offerta']->value->getSpecialPrice());?>
</span>
                                </div>
                                <a href="/albergoPulito/public/Booking/selectDate/<?php echo $_smarty_tpl->tpl_vars['offerta']->value->getIdSpecialOffer();?>
" class="btn btn-primary">Prenota Ora</a>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning" style="text-align: center;">
                        <p>Al momento non ci sono offerte speciali disponibili. Torna a trovarci presto!</p>
                        <a href="/" class="btn btn-primary">Torna alla Home</a>
                    </div>
                <?php }?>
            </div>
        </section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

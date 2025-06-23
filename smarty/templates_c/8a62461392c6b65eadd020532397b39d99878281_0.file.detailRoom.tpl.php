<?php
/* Smarty version 4.3.2, created on 2025-06-24 01:13:22
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\detailRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6859df923818f5_20976896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a62461392c6b65eadd020532397b39d99878281' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\detailRoom.tpl',
      1 => 1750720396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6859df923818f5_20976896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <section class="section-padding room-detail-page">
        <div class="container">
            <div class="room-detail-card card">
                <h1 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</h1>

                <div class="room-gallery">
                    <?php if (!empty($_smarty_tpl->tpl_vars['images']->value)) {?>
                        <div class="main-image">
                            <img src="<?php echo (($tmp = $_smarty_tpl->tpl_vars['images']->value[0]->getFilePath() ?? null)===null||$tmp==='' ? 'images/placeholder.jpg' ?? null : $tmp);?>
" alt="Immagine principale di <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                        </div>
                        <?php if (count($_smarty_tpl->tpl_vars['images']->value) > 1) {?>
                            <div class="thumbnail-gallery">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image', false, 'index');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getFilePath();?>
" alt="Immagine <?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
 di <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['image']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
" data-full-src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getFilePath();?>
">
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php }?>
                    <?php } else { ?>
                        <div class="main-image">
                            <img src="albergoPulito/public/assets/img/camera1.jpg" alt="Nessuna immagine disponibile per <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                        </div>
                    <?php }?>
                </div>

                <div class="room-info">
                    <div class="detail-item">
                        <strong>Tipo:</strong> <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getType(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Posti Letto:</strong> <span><?php echo $_smarty_tpl->tpl_vars['room']->value->getBeds();?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Prezzo per Notte:</strong> <span class="room-price">€<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['room']->value->getPrice(),2,',','.');?>
</span>
                    </div>
                    <div class="detail-item full-width">
                        <strong>Descrizione:</strong>
                        <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                    </div>
                </div>

                <div class="room-actions">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/prenota/<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
" class="btn btn-primary">Prenota Ora</a>
                    <a href="albergoPulito/public/Booking/showAvailableRooms" class="btn btn-secondary">Torna alle Camere</a>
                </div>
            </div>
        </div>
    </section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

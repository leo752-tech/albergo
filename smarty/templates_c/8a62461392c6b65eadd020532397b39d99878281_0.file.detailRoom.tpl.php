<?php
/* Smarty version 4.3.2, created on 2025-06-26 16:15:20
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\detailRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685d55f806f285_08347995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a62461392c6b65eadd020532397b39d99878281' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\detailRoom.tpl',
      1 => 1750947316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685d55f806f285_08347995 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <section class="section-padding room-detail-page">
        <div class="container">
            <div class="room-detail-card card">
                <h1 class="card-title">
                                        <?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {?>
                        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>

                    <?php } else { ?>
                        Dettagli Camera
                    <?php }?>
                </h1>

                <div class="room-gallery">
                    <?php if (!empty($_smarty_tpl->tpl_vars['images']->value)) {?>
                        <div class="main-image-container">
                            <img src="<?php echo (($tmp = $_smarty_tpl->tpl_vars['images']->value[0]->getFilePath() ?? null)===null||$tmp==='' ? 'images/placeholder.jpg' ?? null : $tmp);?>
" 
                                 alt="Immagine principale di <?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>Camera<?php }?>" 
                                 class="img-fluid main-room-image">
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
" 
                                         alt="Immagine <?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
 di <?php if ((isset($_smarty_tpl->tpl_vars['image']->value)) && $_smarty_tpl->tpl_vars['image']->value instanceof EImage) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['image']->value->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>Immagine<?php }?>" 
                                         data-full-src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getFilePath();?>
" 
                                         class="img-fluid thumbnail-image">
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php }?>
                    <?php } else { ?>
                        <div class="main-image-container">
                            <img src="albergoPulito/public/assets/img/camera1.jpg" 
                                 alt="Nessuna immagine disponibile per <?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>questa camera<?php }?>" 
                                 class="img-fluid main-room-image">
                        </div>
                    <?php }?>
                </div>

                <div class="room-info">
                    <div class="detail-item">
                        <strong>Tipo:</strong> 
                        <span><?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getType(), ENT_QUOTES, 'UTF-8', true);
} else { ?>N/D<?php }?></span>
                    </div>
                    <div class="detail-item">
                        <strong>Posti Letto:</strong> 
                        <span><?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo $_smarty_tpl->tpl_vars['room']->value->getBeds();
} else { ?>N/D<?php }?></span>
                    </div>
                    <div class="detail-item">
                        <strong>Prezzo per Notte:</strong> 
                        <span class="room-price">€<?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['room']->value->getPrice(),2,',','.');
} else { ?>N/D<?php }?></span>
                    </div>
                    <div class="detail-item full-width">
                        <strong>Descrizione:</strong>
                        <p><?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getDescription(), ENT_QUOTES, 'UTF-8', true);
} else { ?>Nessuna descrizione disponibile.<?php }?></p>
                    </div>

                                        <form id="bookingForm" action="/albergoPulito/public/Booking/showSummary/<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
" method="post">
                                                <?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {?>
                            <input type="hidden" name="roomId" value="<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
">
                        <?php } else { ?>
                            <input type="hidden" name="roomId" value="0">
                        <?php }?>

                                                <?php if (!empty($_smarty_tpl->tpl_vars['extraServices']->value)) {?>
                            <div class="detail-item full-width mt-4">
                                <strong>Servizi Extra Disponibili:</strong>
                                <div class="extra-services-list">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extraServices']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['service']->value instanceof EExtraService) {?>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" 
                                                       name="selectedServices[]" id="service_<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
">
                                                <label class="form-check-label" for="service_<?php echo $_smarty_tpl->tpl_vars['service']->value->getId();?>
">
                                                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['service']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
 (€<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['service']->value->getPrice(),2,',','.');?>
)
                                                    <p class="service-description"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['service']->value->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                                </label>
                                            </div>
                                        <?php }?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="detail-item full-width mt-4">
                                <strong>Servizi Extra:</strong>
                                <span>Nessun servizio extra disponibile.</span>
                            </div>
                        <?php }?>
                        
                                                <div class="detail-item total-summary mt-3">
                            <strong>Prezzo Stimato (solo camera):</strong>
                            <span class="room-price">
                                €<?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {
echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['room']->value->getPrice(),2,',','.');
} else { ?>0,00<?php }?>
                            </span>
                        </div>

                        <div class="room-actions">
                            <button type="submit" class="btn btn-primary">Procedi con la Prenotazione</button>
                            <a href="/albergoPulito/public/Booking/getAvailableRooms/1" class="btn btn-secondary">Torna alle Camere</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

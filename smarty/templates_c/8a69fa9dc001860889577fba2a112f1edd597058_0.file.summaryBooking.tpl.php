<?php
/* Smarty version 4.3.2, created on 2025-06-28 14:27:49
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\summaryBooking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fdfc552e964_40676578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a69fa9dc001860889577fba2a112f1edd597058' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\summaryBooking.tpl',
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
function content_685fdfc552e964_40676578 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'summary booking'), 0, false);
?>

<section class="section-padding booking-summary-page">
    <div class="container">
        <div class="booking-summary-card card">
            <h1 class="card-title text-center mb-4">Riepilogo della tua Prenotazione</h1>

            <?php if ((isset($_smarty_tpl->tpl_vars['booking']->value)) && $_smarty_tpl->tpl_vars['booking']->value instanceof EBooking) {?>
                <div class="summary-details">
                    <div class="detail-item">
                        <strong>ID Prenotazione:</strong> 
                        <span><?php echo $_smarty_tpl->tpl_vars['booking']->value->getId();?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Data di Prenotazione:</strong> 
                        <span><?php echo $_smarty_tpl->tpl_vars['booking']->value->getBookingDate()->format('d/m/Y H:i');?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Check-in:</strong> 
                        <span><?php echo $_smarty_tpl->tpl_vars['booking']->value->getCheckInDate()->format('d/m/Y');?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Check-out:</strong> 
                        <span><?php echo $_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate()->format('d/m/Y');?>
</span>
                    </div>
                    <div class="detail-item">
                        <strong>Numero di Notti:</strong>
                                                <span>
                            <?php $_smarty_tpl->_assignInScope('checkInTimestamp', $_smarty_tpl->tpl_vars['booking']->value->getCheckInDate()->getTimestamp());?>
                            <?php $_smarty_tpl->_assignInScope('checkOutTimestamp', $_smarty_tpl->tpl_vars['booking']->value->getCheckOutDate()->getTimestamp());?>
                            <?php $_smarty_tpl->_assignInScope('diffSeconds', $_smarty_tpl->tpl_vars['checkOutTimestamp']->value-$_smarty_tpl->tpl_vars['checkInTimestamp']->value);?>
                            <?php $_smarty_tpl->_assignInScope('numNights', ceil($_smarty_tpl->tpl_vars['diffSeconds']->value/(60*60*24)));?>
                            <?php echo $_smarty_tpl->tpl_vars['numNights']->value;?>

                        </span>
                    </div>

                                        <?php if ((isset($_smarty_tpl->tpl_vars['room']->value)) && $_smarty_tpl->tpl_vars['room']->value instanceof ERoom) {?>
                        <h3 class="mt-4 mb-3">Dettagli Camera</h3>
                        <div class="detail-item">
                            <strong>Camera:</strong> 
                            <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
 (ID: <?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
)</span>
                        </div>
                        <div class="detail-item">
                            <strong>Tipo Camera:</strong> 
                            <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value->getType(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </div>
                        <div class="detail-item">
                            <strong>Posti Letto:</strong> 
                            <span><?php echo $_smarty_tpl->tpl_vars['room']->value->getBeds();?>
</span>
                        </div>
                        <div class="detail-item">
                            <strong>Prezzo per Notte (Camera):</strong> 
                            <span>€<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['room']->value->getPrice(),2,',','.');?>
</span>
                        </div>
                    <?php } else { ?>
                        <div class="detail-item alert alert-warning mt-4">
                            <strong>Camera:</strong> <span>Dettagli della camera non disponibili. (ID Camera: <?php echo $_smarty_tpl->tpl_vars['booking']->value->getIdRoom();?>
)</span>
                        </div>
                    <?php }?>

                                        <?php if (!empty($_smarty_tpl->tpl_vars['selectedExtraServices']->value)) {?>
                        <h3 class="mt-4 mb-3">Servizi Extra Selezionati</h3>
                        <ul class="list-group list-group-flush services-summary-list">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selectedExtraServices']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                                <?php if ($_smarty_tpl->tpl_vars['service']->value instanceof EExtraService) {?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['service']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                                        <span class="badge bg-primary rounded-pill">€<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['service']->value->getPrice(),2,',','.');?>
</span>
                                    </li>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php } else { ?>
                        <h3 class="mt-4 mb-3">Servizi Extra</h3>
                        <div class="detail-item">
                            <span>Nessun servizio extra selezionato.</span>
                        </div>
                    <?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer() !== null && (isset($_smarty_tpl->tpl_vars['specialOffer']->value)) && $_smarty_tpl->tpl_vars['specialOffer']->value instanceof ESpecialOffer) {?>
                        <div class="detail-item highlighted mt-4">
                            <strong>Offerta Speciale:</strong> 
                            <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['specialOffer']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                            <p class="service-description"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['specialOffer']->value->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer() !== null) {?>
                         <div class="detail-item mt-4">
                            <strong>Offerta Speciale ID:</strong> 
                            <span><?php echo $_smarty_tpl->tpl_vars['booking']->value->getIdSpecialOffer();?>
 (Dettagli non disponibili)</span>
                        </div>
                    <?php }?>

                    <div class="detail-item total-price mt-4">
                        <strong>Prezzo Totale:</strong> 
                        <span class="price">€<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['booking']->value->getTotalPrice(),2,',','.');?>
</span>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['booking']->value->getCancellation()) {?>
                        <div class="alert alert-warning text-center mt-3">
                            Questa prenotazione è stata **cancellata**.
                        </div>
                    <?php }?>
                </div>

                <div class="booking-actions text-center mt-5">
                                        <a href="/albergoPulito/public/home" class="btn btn-secondary">Torna alla Home</a>
                    <a href="/albergoPulito/public/Booking/showPayment/<?php echo $_smarty_tpl->tpl_vars['booking']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['booking']->value->getTotalPrice();?>
" class="btn btn-primary">Prenota</a>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger text-center">
                    Spiacenti, non è stato possibile caricare i dettagli della prenotazione.
                </div>
            <?php }?>
        </div>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

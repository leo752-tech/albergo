<?php
/* Smarty version 4.3.2, created on 2025-06-28 14:28:06
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\payment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fdfd64ac1f6_42003854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6db757fe16028212b5f9847ae1b9527bf8a8656' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\payment.tpl',
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
function content_685fdfd64ac1f6_42003854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'payment'), 0, false);
?>

<section class="section-padding payment-page">
    <div class="container">
        <div class="payment-card card">
            <h1 class="card-title text-center mb-4">Dettagli di Pagamento</h1>
            <p class="text-center text-muted mb-4">
                Inserisci i dettagli della tua carta di credito per completare la prenotazione.
                Questo è un sistema di pagamento **fittizio** a scopo dimostrativo e non elabora transazioni reali.
            </p>

            <form id="paymentForm" action="/albergoPulito/public/Booking/makeBooking" method="post">
                
                <?php if ((isset($_smarty_tpl->tpl_vars['bookingId']->value))) {?>
                    <input type="hidden" name="bookingId" value="<?php echo $_smarty_tpl->tpl_vars['bookingId']->value;?>
">
                <?php }?>

                <?php if ((isset($_smarty_tpl->tpl_vars['totalPrice']->value))) {?>
                    <input type="hidden" name="totalPrice" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['totalPrice']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <?php }?>

                <div class="mb-3">
                    <label for="cardName" class="form-label">Nome sulla Carta</label>
                    <input type="text" class="form-control" id="cardName" name="cardName" placeholder="Nome Cognome" required>
                </div>

                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Numero della Carta</label>
                                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" pattern="[0-9]{13,19}" placeholder="XXXX XXXX XXXX XXXX" title="Inserisci un numero di carta valido (13-19 cifre)" required>
                                    </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiryMonth" class="form-label">Mese di Scadenza</label>
                        <select class="form-select" id="expiryMonth" name="expiryMonth" required>
                            <option value="">Mese</option>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <option value="<?php echo sprintf('%02d',$_smarty_tpl->tpl_vars['i']->value);?>
"><?php echo sprintf('%02d',$_smarty_tpl->tpl_vars['i']->value);?>
</option>
                            <?php }
}
?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="expiryYear" class="form-label">Anno di Scadenza</label>
                        <select class="form-select" id="expiryYear" name="expiryYear" required>
                            <option value="">Anno</option>
                            <?php $_smarty_tpl->_assignInScope('currentYear', smarty_modifier_date_format("now","%Y"));?>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (0) : 0-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['currentYear']->value+$_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['currentYear']->value+$_smarty_tpl->tpl_vars['i']->value;?>
</option>
                            <?php }
}
?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV / CVC</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv" pattern="[0-9]{3,4}" placeholder="XXX" title="Inserisci il codice CVV (3 o 4 cifre)" required>
                                    </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Paga Ora</button>
                    <a href="/albergoPulito/public/Booking/showSummary/<?php if ((isset($_smarty_tpl->tpl_vars['bookingId']->value))) {
echo $_smarty_tpl->tpl_vars['bookingId']->value;
} else { ?>0<?php }?>" class="btn btn-secondary btn-lg">Torna al Riepilogo</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

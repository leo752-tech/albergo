<?php
/* Smarty version 4.3.2, created on 2025-06-20 21:39:04
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\selectDate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6855b8d8d03551_44185170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e34f99f27a3809a47261f35bd5a42c7c4747b317' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\selectDate.tpl',
      1 => 1750448336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6855b8d8d03551_44185170 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section id="booking-form" class="container section-padding">
    <h2>Prenota il Tuo Soggiorno</h2>
    <form action="/~momok/Booking/getAvailableRooms" method="POST" class="form-grid">
        <div class="form-group">
            <label for="check-in">Data Check-in:</label>
            <input type="date" id="check-in" name="data_check_in" required>
        </div>
        <div class="form-group">
            <label for="check-out">Data Check-out:</label>
            <input type="date" id="check-out" name="data_check_out" required>
        </div>
        <div class="form-group">
            <label for="num-adults">Adulti:</label>
            <input type="number" id="num-adults" name="num_adulti" min="1" value="1" required>
        </div>
        <div class="form-group">
            <label for="num-children">Bambini:</label>
            <input type="number" id="num-children" name="num_bambini" min="0" value="0">
        </div>

        <div class="form-group full-width">
            <label for="room-selection">Seleziona Camera:</label>
            <select id="room-selection" name="id_camera" required>
                <option value="">Scegli una camera disponibile</option>
                <option value="1">Camera Doppia Standard - €120/notte</option>
                <option value="2">Suite Panoramica - €250/notte</option>
                </select>
        </div>

        <div class="form-group full-width">
            <label>Servizi Extra (opzionale):</label>
            <div class="checkbox-group">
                <input type="checkbox" id="service-colazione" name="servizi_extra[]" value="1">
                <label for="service-colazione">Colazione in Camera (€15)</label><br>
                
                <input type="checkbox" id="service-spa" name="servizi_extra[]" value="2">
                <label for="service-spa">Accesso SPA (€30/persona)</label><br>

                <input type="checkbox" id="service-transfer" name="servizi_extra[]" value="3">
                <label for="service-transfer">Transfer Aeroportuale (€50)</label><br>
                </div>
        </div>

        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Conferma Prenotazione</button>
        </div>
    </form>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

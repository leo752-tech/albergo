<?php
/* Smarty version 4.3.2, created on 2025-06-24 18:48:44
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\manageAccountDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ad6ec842a99_65579321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0d0db694c8dbb0145426ef60aa3f4ebbd6bab96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\manageAccountDetail.tpl',
      1 => 1750707098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685ad6ec842a99_65579321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Il Mio Profilo'), 0, false);
?>

<main>
    <div class="container user-profile">
        <h2>Il Tuo Profilo</h2>

        <div class="profile-details card"> <div class="card-title">Dettagli Utente</div> <div class="detail-item">
                <strong>Nome:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->getFirstName();?>

            </div>
            <div class="detail-item">
                <strong>Cognome:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->getLastName();?>

            </div>
            <div class="detail-item">
                <strong>Email:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>

            </div>
            <div class="detail-item">
                <strong>Data di Nascita:</strong> <?php echo $_smarty_tpl->tpl_vars['birthDate']->value;?>

            </div>
            <div class="detail-item">
                <strong>Luogo di Nascita:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->getBirthPlace();?>

            </div>
            <div class="detail-item">
                <strong>Stato Account:</strong>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->getIsBanned()) {?>
                    <span style="color: red; font-weight: bold;">Bannato</span>
                <?php } else { ?>
                    Attivo
                <?php }?>
            </div>
                                </div>

        <div class="profile-actions">
            <a href="/albergoPulito/public/User/showUpdateAccount" class="btn btn-primary">Modifica Profilo</a>
            <a href="/albergoPulito/public/User/showUpdatePassword" class="btn btn-secondary">Cambia Password</a>
            <a href="/albergoPulito/public/User/showMyBookings" class="btn btn-primary">Le Mie Prenotazioni</a>
        </div>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>  <?php }
}

<?php
/* Smarty version 4.3.2, created on 2025-06-12 22:46:56
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_684b3cc0ee2d02_74649153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c758e6c4ee3c5b53acd8c2ab9554276bbc1cdeae' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\login.tpl',
      1 => 1749761198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_684b3cc0ee2d02_74649153 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>
 include 'header.tpl';<?php echo '?>'; ?>

<section id="auth-forms" class="container section-padding">
    <h2>Accedi al Tuo Account</h2>
    <form action="/~momok/dummy/User/login" method="POST" class="auth-form">
        <div class="form-group">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary full-width">Accedi</button>
    </form>

    <h2 class="mt-5">Nuovo Utente? Registrati</h2>
    <form action="/~momok/dummy/User/registration" method="POST" class="auth-form">
        <div class="form-group">
            <label for="reg-nome">Nome:</label>
            <input type="text" id="reg-nome" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="reg-cognome">Cognome:</label>
            <input type="text" id="reg-cognome" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="reg-password">Password:</label>
            <input type="password" id="reg-password" name="password" required>
        </div>
        <div class="form-group">
            <label for="reg-dataNascita">Data di Nascita:</label>
            <input type="date" id="reg-dataNascita" name="birthDate" required>
        </div>
        <div class="form-group">
            <label for="reg-comuneNascita">Comune di Nascita:</label>
            <input type="text" id="reg-comuneNascita" name="birthPlace" required>
        </div>
        <button type="submit" class="btn btn-secondary full-width">Registrati</button>
    </form>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

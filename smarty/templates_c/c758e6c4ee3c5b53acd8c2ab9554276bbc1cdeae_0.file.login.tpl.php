<?php
/* Smarty version 4.3.2, created on 2025-06-19 21:38:46
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68546746598908_01845155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c758e6c4ee3c5b53acd8c2ab9554276bbc1cdeae' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\login.tpl',
      1 => 1750361917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_68546746598908_01845155 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
<section id="auth-forms" class="container section-padding">
    <h2>Accedi al Tuo Account</h2>
    <form action="/~momok/User/login" method="POST" class="auth-form">
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

    

</main>
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section about">
                        <h3>Nome Hotel</h3>
                        <p>Benvenuti nel vostro rifugio di lusso. Offriamo il massimo comfort e servizi impeccabili per rendere il vostro soggiorno indimenticabile.</p>
                    </div>
                    <div class="footer-section links">
                        <h3>Link Utili</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="camere.php">Camere</a></li>
                            <li><a href="servizi.php">Servizi</a></li>
                            <li><a href="prenota.php">Prenota Ora</a></li>
                            <li><a href="recensioni.php">Recensioni</a></li>
                            <li><a href="contatti.php">Contatti</a></li>
                        </ul>
                    </div>
                    <div class="footer-section contact">
                        <h3>Contatti</h3>
                        <p><i class="fa fa-map-marker"></i> Coppito, L'Aquila Italia</p>
                        <p><i class="fa fa-phone"></i> +39 3423453456</p>
                        <p><i class="fa fa-envelope"></i> info@nomehotel.it</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    © 2025 Nome Hotel. Tutti i diritti riservati.
                </div>
            </div>
        </footer>
        <?php echo '<script'; ?>
 src="/~momok/assets/js/script.js"><?php echo '</script'; ?>
>
        </body>
</html><?php }
}

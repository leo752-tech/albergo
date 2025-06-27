<?php
/* Smarty version 4.3.2, created on 2025-06-27 12:23:56
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updatePassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685e713c484aa8_44393114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30b33666654bb7ae673332eaaf66ca028904f5bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updatePassword.tpl',
      1 => 1750705363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685e713c484aa8_44393114 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section>
        <div>
            <div>
                <h3 class="card-title mt-5">Modifica Password</h3>
                <form action="/albergoPulito/public/User/updatePassword" method="POST">
                    <div class="form-group">
                        <label for="currentPassword">Password Attuale:</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Nuova Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword">Conferma Nuova Password:</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Cambia Password</button>
                </form>
            </div>
        </div>
    </section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

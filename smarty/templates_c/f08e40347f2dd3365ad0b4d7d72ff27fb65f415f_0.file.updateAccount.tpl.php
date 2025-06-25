<?php
/* Smarty version 4.3.2, created on 2025-06-25 15:48:25
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\updateAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685bfe2908e6e6_72784363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f08e40347f2dd3365ad0b4d7d72ff27fb65f415f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\updateAccount.tpl',
      1 => 1750697620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685bfe2908e6e6_72784363 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
    <section id="user-profile" class="container section-padding">

        <div class="profile-details card">
            <div class="card-body">
                <h3 class="card-title">Dettagli Personali</h3>
                <form action="/albergoPulito/public/User/updateAccount" method="POST">
                    <div class="form-group">
                        <label for="firstName">Nome:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getFirstName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Cognome:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getLastName() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getEmail() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                    </div>
                    <div class="form-group">
                        <label for="birthDate">Data di Nascita:</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getBirthDate()->format('d-m-Y') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                    </div>
                    <div class="form-group">
                        <label for="birthPlace">Luogo di Nascita:</label>
                        <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->getBirthPlace() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Aggiorna Profilo</button>
                </form>
            </div>
        </div>
    </section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

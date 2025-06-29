<?php
/* Smarty version 4.3.2, created on 2025-06-29 12:29:56
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\setReview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_686115a4d6ac88_59165026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33f3469466101215e1269915dd8c075ef10f9a72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\setReview.tpl',
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
function content_686115a4d6ac88_59165026 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'set review'), 0, false);
?>

<form action="/albergoPulito/public/User/setReview" method="POST">
    <div class="form-group">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" class="form-control" required maxlength="100">
                
    </div>

    <div class="form-group">
        <label for="rating">Valutazione (1-5):</label>
        <select id="rating" name="rating" class="form-control" required>
            <option value="">Seleziona un voto</option>
            <option value="1">1 Stella - Pessimo</option>
            <option value="2">2 Stelle - Scarso</option>
            <option value="3">3 Stelle - Nella media</option>
            <option value="4">4 Stelle - Buono</option>
            <option value="5">5 Stelle - Eccellente</option>
        </select>
        
    </div>

    <div class="form-group">
        <label for="description">Descrizione della recensione:</label>
        <textarea id="description" name="description" class="form-control" rows="5" required maxlength="1000"></textarea>
        
    </div>

        <input type="hidden" name="idRegisteredUser" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['loggedInUserId']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
       

    <button type="submit" class="btn btn-primary">Invia Recensione</button>
</form>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

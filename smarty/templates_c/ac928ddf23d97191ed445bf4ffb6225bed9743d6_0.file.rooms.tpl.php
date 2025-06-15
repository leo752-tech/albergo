<?php
/* Smarty version 4.3.2, created on 2025-06-15 16:54:05
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\rooms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_684ede8d899a07_98349745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac928ddf23d97191ed445bf4ffb6225bed9743d6' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\rooms.tpl',
      1 => 1749997995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_684ede8d899a07_98349745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section id="rooms-list" class="container section-padding">
    <h2>Le Nostre Camere</h2>
    <p>Scopri il comfort e l'eleganza delle nostre sistemazioni, pensate per ogni tipo di viaggiatore.</p>

    <div class="room-grid">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'room');
$_smarty_tpl->tpl_vars['room']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->do_else = false;
?>
            <div class="room-card">
                <img src="assets/img/camera1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['room']->value->getName();?>
">
                <h3><?php echo $_smarty_tpl->tpl_vars['room']->value->getName();?>
 (<?php echo $_smarty_tpl->tpl_vars['room']->value->getType();?>
)</h3>
                <p>Posti letto: <?php echo $_smarty_tpl->tpl_vars['room']->value->getBeds();?>
</p>
                <p class="price">Prezzo a notte: &euro;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['room']->value->getPrice());?>
</p>
                <a href="prenota.php?room_id=<?php echo $_smarty_tpl->tpl_vars['room']->value->getId();?>
" class="btn btn-primary">Dettagli & Prenota</a>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

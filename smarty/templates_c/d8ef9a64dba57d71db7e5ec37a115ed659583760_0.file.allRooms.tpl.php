<?php
/* Smarty version 4.3.2, created on 2025-06-27 12:15:54
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\allRooms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685e6f5acb6735_34018516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8ef9a64dba57d71db7e5ec37a115ed659583760' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\allRooms.tpl',
      1 => 1751019348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685e6f5acb6735_34018516 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section id="all-rooms" class="container section-padding">
    <h2>Tutte le Camere Disponibili</h2>
    <div class="rooms-grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'room');
$_smarty_tpl->tpl_vars['room']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->do_else = false;
?>
            <div class="room-card">
                <img src="<?php echo $_smarty_tpl->tpl_vars['room']->value[1][0]->getFilePath();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['room']->value[0]->getName();?>
">
                <h3><?php echo $_smarty_tpl->tpl_vars['room']->value[0]->getName();?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['room']->value[0]->getDescription();?>
</p>
                <a href="/albergoPulito/public/Booking/showDetailRoomWB/<?php echo $_smarty_tpl->tpl_vars['room']->value[0]->getId();?>
" class="btn btn-secondary">Scopri di più</a>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="text-center">
        <a href="/albergoPulito/public/" class="btn btn-primary">Torna alla home</a>
    </div>
</section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php
/* Smarty version 4.3.2, created on 2025-06-27 22:04:47
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\availableRooms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685ef95fef0181_74970194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a13cf787a490ed6eccd537c42f9847be58bd48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\availableRooms.tpl',
      1 => 1751022700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685ef95fef0181_74970194 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\albergoPulito\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>



<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Le Nostre Camere'), 0, false);
?>

<section id="rooms-overview" class="container section-padding">
    <h2>Trova la Camera Perfetta</h2>


        

        <h3>Camere Disponibili </h3>

    <?php if (!empty($_smarty_tpl->tpl_vars['rooms']->value)) {?>
        <div class="rooms-grid">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'room');
$_smarty_tpl->tpl_vars['room']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->do_else = false;
?>
                <div class="room-card">
                    <?php if (!empty($_smarty_tpl->tpl_vars['room']->value[1])) {?>
                    
                        <img src="<?php echo $_smarty_tpl->tpl_vars['room']->value[1][0]->getFilePath();?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['room']->value[1][0]->getName(), ENT_QUOTES, 'UTF-8', true);?>
" class="img-fluid">
                    <?php } else { ?>
                        <img src="/albergoPulito/public/images/camera1.jpg" alt="Immagine di placeholder" class="img-fluid">
                    <?php }?>
                    <h4><?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value[0]->getName() ?? null)===null||$tmp==='' ? 'Nome Camera' ?? null : $tmp);?>
</h4>
                    <p class="room-type"><i class="fas fa-info-circle"></i> Tipo: <?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value[0]->getType() ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                    <p class="room-beds"><i class="fas fa-bed"></i> Posti Letto: <?php echo (($tmp = $_smarty_tpl->tpl_vars['room']->value[0]->getBeds() ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</p>
                    <p class="room-description"><?php echo (($tmp = smarty_modifier_truncate($_smarty_tpl->tpl_vars['room']->value[0]->getDescription(),100,"...") ?? null)===null||$tmp==='' ? 'Nessuna descrizione disponibile.' ?? null : $tmp);?>
</p>
                    <div class="room-price">Prezzo: <strong><?php echo (($tmp = sprintf("%.2f",$_smarty_tpl->tpl_vars['room']->value[0]->getPrice()) ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
 €</strong> / notte</div>
                    
                  
                  
                    <a href="/albergoPulito/public/Booking/showDetailRoom/<?php echo $_smarty_tpl->tpl_vars['room']->value[0]->getId();?>
" class="btn btn-primary">Prenota Ora</a>
                    
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Al momento non ci sono camere disponibili che corrispondono ai tuoi criteri di ricerca. Prova a modificare le date o il numero di ospiti.
        </div>
    <?php }?>
</section>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}

<?php
/* Smarty version 4.3.2, created on 2025-06-28 11:32:28
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\statistics_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685fb6ac912fa5_44590051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5487d0dd5479190a5c0234023a184154fe6a1507' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\statistics_dashboard.tpl',
      1 => 1750927992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_685fb6ac912fa5_44590051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Statistiche'), 0, false);
?>

<h2>Dashboard Statistiche</h2>

<div class="stats-container">

    <h3>📊 Tasso di Occupazione per Camera (%)</h3>
    <canvas id="occupancyChart"></canvas>

    <h3>🧮 Media Notti per Prenotazione</h3>
    <p><?php echo round((float) (($tmp = $_smarty_tpl->tpl_vars['avgStay']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp), (int) 2, (int) 1);?>
 notti</p>

    <h3>🚫 Tasso di Cancellazione</h3>
    <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['cancelRate']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
%</p>

    <h3>💰 Ricavi per Servizi Extra</h3>
    <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['extraServiceRevenue']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
€</p>

    <h3>⭐ Distribuzione Recensioni</h3>
    <canvas id="reviewChart"></canvas>

    <h3>🔍 Parole Più Frequenti nelle Recensioni</h3>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frequentKeywords']->value, 'count', false, 'word');
$_smarty_tpl->tpl_vars['count']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['word']->value => $_smarty_tpl->tpl_vars['count']->value) {
$_smarty_tpl->tpl_vars['count']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['word']->value;?>
 → <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

</div>

	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	// Occupancy Chart
	const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
	new Chart(occupancyCtx, {
		type: 'bar',
		data: {
			labels: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roomStats']->value, 'r', false, NULL, 'roomLoop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['total'];
?>"<?php echo $_smarty_tpl->tpl_vars['r']->value['room'];?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_roomLoop']->value['last'] : null)) {?>, <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
			datasets: [{
				label: 'Occupancy Rate (%)',
				data: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roomStats']->value, 'r', false, NULL, 'rateLoop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['total'];
echo $_smarty_tpl->tpl_vars['r']->value['occupancy_rate'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_rateLoop']->value['last'] : null)) {?>, <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: { beginAtZero: true, max: 100 }
			}
		}
	});

	// Review Ratings Chart
	const reviewCtx = document.getElementById('reviewChart').getContext('2d');
	new Chart(reviewCtx, {
		type: 'bar',
		data: {
			labels: ['1★', '2★', '3★', '4★', '5★'],
			datasets: [{
				label: 'Numero Recensioni',
				data: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['reviewRatings']->value ));?>
,
				backgroundColor: 'rgba(54, 162, 235, 0.5)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: { beginAtZero: true }
			}
		}
	});
	<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender('file:footer_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

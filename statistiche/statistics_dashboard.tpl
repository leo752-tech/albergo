{include file='header_admin.tpl' pageTitle='Statistiche'}

<h2>Dashboard Statistiche</h2>

<div class="stats-container">

    <h3>📊 Tasso di Occupazione per Camera (%)</h3>
    <canvas id="occupancyChart"></canvas>

    <h3>🧮 Media Notti per Prenotazione</h3>
    <p>{$avgStay|default:0|round:2} notti</p>

    <h3>🚫 Tasso di Cancellazione</h3>
    <p>{$cancelRate|default:0}%</p>

    <h3>💰 Ricavi per Servizi Extra</h3>
    <p>{$extraServiceRevenue|default:0}€</p>

    <h3>⭐ Distribuzione Recensioni</h3>
    <canvas id="reviewChart"></canvas>

    <h3>🔍 Parole Più Frequenti nelle Recensioni</h3>
    <ul>
        {foreach from=$frequentKeywords key=word item=count}
            <li>{$word} → {$count}</li>
        {/foreach}
    </ul>

</div>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
	// Occupancy Chart
	const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
	new Chart(occupancyCtx, {
		type: 'bar',
		data: {
			labels: [{foreach from=$roomStats item=r name=roomLoop}"{$r.room}"{if !$smarty.foreach.roomLoop.last}, {/if}{/foreach}],
			datasets: [{
				label: 'Occupancy Rate (%)',
				data: [{foreach from=$roomStats item=r name=rateLoop}{$r.occupancy_rate}{if !$smarty.foreach.rateLoop.last}, {/if}{/foreach}],
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
				data: {$reviewRatings|json_encode nofilter},
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
	</script>


{include file='footer_admin.tpl'}

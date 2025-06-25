app/utility/
UStatistiche.php --> Nuovo file
Contiene tutta la logica di calcolo delle statistiche

----------------------------------------------------------------

app/controller/
CAdmin.php --> Modificato
Aggiunto metodo:

php
Copia
public static function showStatistics()


-----------------------------------------------------------------

app/view/
VStatistics.php --> Modificato/Aggiunto
Metodo showDashboard($stats) per visualizzare i dati nel template Smarty.



----------------------------------------------------------------------------------

templates/
statistics_dashboard.tpl --> Nuovo file
Template Smarty della dashboard, include grafici con Chart.js.

header_admin.tpl --> Modificato
Aggiunto il link nel menu di navigazione:

smarty
Copia
<li><a href="/albergoPulito/public/Admin/showStatistics"><i class="fas fa-chart-line"></i> Statistiche</a></li>



-------------------------------------------------------------------------------------------

core/
StartSmarty.php --> Modificato
Registra json_encode come plugin per Smarty (una sola volta):

php
Copia
$smarty->registerPlugin('modifier', 'json_encode', 'json_encode');
<?php

require_once(__DIR__.'/../conf/DashboardConfig.php');

$intervals = array(
	'-8hours'  => 'Dernières 8 heures',
	'-24hours' => 'Dernières 24 heures',
	'-7days'   => 'Derniers 7 jours',
);

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thermo</title>
</head>
<body>
<?php
foreach ($intervals as $param => $label) {
	echo "<h3>$label</h3>\n";
	echo '<img src="http://'.$config->host.'/render/?width=400&height=300&tz=Europe%2FParis&minXStep=3&from='.$param.'&target=temp.couloir&target=temp.salon" />';
	echo '<img src="http://'.$config->host.'/render/?width=400&height=300&tz=Europe%2FParis&minXStep=3&from='.$param.'&target=temp.couloir&target=temp.salon&target=ws.myweather.temp" />';
}
?>
</body>
</html>

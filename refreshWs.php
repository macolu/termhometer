<?php

require(__DIR__.'/conf/WsConfig.php');

$url = sprintf(
	'http://www.myweather2.com/developer/forecast.ashx?uac=%s&query=%s&temp_unit=c&output=json',
	$config->key, $config->coordinates
);

$c = curl_init($url);
curl_setopt($c, CURLOPT_TIMEOUT, 10);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($c);

if ($res === false) {
	// curl failed
	throw new Exception(sprintf('curl failed: %s', curl_error($c)));
}

$data = json_decode($res);

$date = time();
$metrics = array();

$metrics['ws.myweather.temp'] = $data->weather->curren_weather[0]->temp;
$metrics['ws.myweather.humidity'] = $data->weather->curren_weather[0]->humidity;

foreach ($metrics as $key => $value) {
	shell_exec("echo $key $value $date | nc 127.0.0.1 2003");
}


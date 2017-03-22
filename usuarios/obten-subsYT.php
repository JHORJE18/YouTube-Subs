<?php

//Sacamos canal ID
$division = explode("/", $link);

$canalID = $division[4];

$api = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$canalID.'&key=AIzaSyDOuJvEC62tWQX7T5jtCx4Tqr8ZVvCqC-Y');

$resultado = json_decode($api, true);

$subs = intval($resultado['items'][0]['statistics']['subscriberCount']);
$visitas = intval($resultado['items'][0]['statistics']['viewCount']);
$videos = intval($resultado['items'][0]['statistics']['videoCount']);
;
?>
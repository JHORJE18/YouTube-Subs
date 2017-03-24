<?php

//Sacamos canal ID
$division = explode("/", $link);

$canalID = $division[4];

//Obten ultima clave para API Google
$api = "SELECT * FROM `GoogleAPI` ORDER BY `GoogleAPI`.`ID` DESC";
        if ($resultado = $conexion -> query($consulta)){
            $obj = $resultado->fetch_array();          //Mete los valores en el array $fila[]
            $llave = $obj[1];
        }

$api = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$canalID.'&key='.$llave.'');

$resultado = json_decode($api, true);

$subs = intval($resultado['items'][0]['statistics']['subscriberCount']);
$visitas = intval($resultado['items'][0]['statistics']['viewCount']);
$videos = intval($resultado['items'][0]['statistics']['videoCount']);

?>
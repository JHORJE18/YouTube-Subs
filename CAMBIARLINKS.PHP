<?php 
  include 'conexion.php';

    $sql = "SELECT `ID`, `LINK` FROM `usuarios` WHERE `LINK` LIKE '%https://www.youtube.com/channel%' ORDER BY `ID` ASC";
    echo 'Consultando '.$sql.'<br>';
    if ($resultado = $conexion->query($sql)){
        $total = $resultado->num_rows;
        echo 'Encontrado '.$total.' resultados <br>';

        for ($i=0; $i<$total; $i++){
            $cambia = $sql.' LIMIT '.$i.' ,1';
            echo 'Analizando -- '.$cambia.'<br>';
            if ($resultadoCAM = $conexion->query($cambia)){
                $datos = $resultadoCAM->fetch_array();

                $division = explode("/", $datos[1]);
                $limpiar = explode("?", $division[4]);
                $canalID = $limpiar[0];

                echo $canalID.'<br>';
                $arreglar = "UPDATE `usuarios` SET `LINK`= '$canalID' WHERE ID = $datos[0]";
                if ($conexion->query($arreglar)){
                    echo 'Cambiado correctamente <br>';
                }
            }
        }
    }

?>

<h1>Cambiando links</h1>
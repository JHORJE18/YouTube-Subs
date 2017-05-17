<?php 
    include('conexion.php');

    $sql = "SELECT DISTINCT `USER-USER` FROM `subscripcion` ORDER BY `USER-USER` ASC";
        if ($resultado = $conexion -> query($canalesMALOS)){
            $total = $resultado -> num_rows;

            //Para cada elemento
            for ($i =0; $i < $total; $i++){
                if ($resultadoCC = $conexion ->query($sql . " LIMIT " . $i . " ,1")){
                    $linkLM = $resultadoCC -> fetch_array(); 

                    //Consultamos su usuario
                    $userSQL = "SELECT * FROM usuarios WHERE LINK LIKE \'%'$linkLM[0]'%\' ";
                    if ($resultadoUSER = $conexion -> query($userSQL)){
                        $usuario = $resultadoUSER -> fetch_array();

                        $modificar = 'UPDATE `usuarios` SET `LINK`= '.$linkLM.' WHERE ID = "'.$usuario[0].'"';
                        if ($resultadoNL = $conexion -> query($modificar)){
                            echo 'Enlace del usuario '.$usuario[1].' --> '.$linkLM.'<br>';
                        }
                    }
                }
            }
        }

?>

<h1>CAmbiar links</h1>
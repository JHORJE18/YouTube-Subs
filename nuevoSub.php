<?php
  session_start();
?>
<?php
include 'conexion.php';

    if ($_GET['canal'] != null){
        //Puede suscribirse
        $linkID = $_GET['canal'];

        //Consultar si el canal destino esta en la BBDD
            $linkBBDD = $linkID;
            $consultaP = "SELECT * FROM usuarios WHERE LINK='$linkBBDD'";
            if ($resultado = $conexion -> query($consultaP)){
                //Determinamos numero tablas
                $num = $resultado -> num_rows;
            }

            if ($num > 0){
                //Canal existe
                $sesion = $_SESSION['usuario'];
                $consultaP = "SELECT * FROM subscripcion WHERE `USER-SUB`='$sesion'  AND `USER-USER` ='$linkID'";
                if ($resultado = $conexion -> query($consultaP)){
                    //Determinamos numero tablas
                    $num = $resultado -> num_rows;
                }

                if ($num > 0){
                    //Ya ha sido suscrito teoricamente
                    $mensaje = "Ya te has suscrito a este canal";
                    $link = "https://www.youtube.com/channel/".$linkID."?sub_confirmation=1";
                    header("Location: $link");
                }   else    {
                    //Redirigimos a suscribirle
                    $tiempo = date("Y-m-d/H:i:s");
                    $nuevo = "INSERT INTO subscripcion (`USER-SUB`, `USER-USER`, `TIEMPO`) VALUES ('$sesion', '$linkID', '$tiempo');";
                        $result= $conexion -> query($nuevo);
                    
                    //Obtener numero de suscripciones acumuladas
                    $numREG = "SELECT * FROM `subscripcion` WHERE `USER-SUB`='$sesion'";  
                    if ($resultadoREG = $conexion -> query($numREG)){
                        //Determinamos numero tablas
                        $numSUS = $resultadoREG -> num_rows;
                    }

                    $add = "UPDATE usuarios SET SUBSCRITO ='$numSUS' WHERE `usuarios`.`USUARIO` ='$sesion';";
                        $resultALT= $conexion -> query($add);

                        if ($result && $numREG && $add){
                            //Todo OK
                            $link = "https://www.youtube.com/channel/".$linkID."?sub_confirmation=1";
                            header("Location: $link");
                        }   else    {
                            echo 'No se te ha podido suscribir en el sistema';
                        }
                }

            }   else {
                //Canal no existe
                $mensaje = "El canal al que intentas suscribirte, no esta registrado en la web -- ".$consultaP.$num;
            }
    }   else    {
        //No ha mandado ningun canal
        $mensaje = "No se ha recibido el canal al que te vas a suscribir";
    }

echo $mensaje;
?>
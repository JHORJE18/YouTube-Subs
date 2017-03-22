<?php
  session_start();
?>
<?php
include 'conexion.php';

    if ($_GET['canal'] != null){
        //Puede suscribirse
        $linkID = $_GET['canal'];

        //Consultar si el canal destino esta en la BBDD
            $linkBBDD = "https://www.youtube.com/channel/".$linkID;
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
                }   else    {
                    //Redirigimos a suscribirle
                    $tiempo = date("Y-m-d/H:i:s");
                    $nuevo = "INSERT INTO subscripcion (`USER-SUB`, `USER-USER`, `TIEMPO`) VALUES ('$sesion', '$linkID', '$tiempo');";

                     //Introducir datos en BBDD
                        $result= $conexion -> query($nuevo);
                        if (!$result){
                            echo 'No se te ha podido suscribir en el sistema<br>'.$nuevo;
                        }   else    {
                            //Todo OK
                            $link = "http://www.youtube.com/subscription_center?add_user=".$linkID;
                            header("Location: $link");
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
<?php
            //Sacar ID del canal
            $division = explode("/", $link);
            $canalID = end($division);

            //Visualizar estadisticas de suscripciones conseguidas
            $consultaSUBS = "SELECT * FROM subscripcion WHERE `USER-USER`= '$canalID'";
                if ($resultado = $conexion -> query($consultaSUBS)){
                //Determinamos numero tablas
                 $subsWEB = $resultado -> num_rows;
                }

            //Comprueba si estas suscrito
            $sesion = $_SESSION['usuario'];
            $suscritoYA = "SELECT * FROM `subscripcion` WHERE `USER-SUB` = '$sesion' AND `USER-USER` = '$canalID'";
                if ($resultado = $conexion -> query($suscritoYA)){
                //Determinamos numero tablas
                 $numYA = $resultado -> num_rows;
                }

                if ($numYA != null){
                    $ya = true;
                }   else    {
                    $ya = false;
                }

            //Visualizar estadisticas de canales a los que se ha suscrito
            $consultaCOL = "SELECT * FROM subscripcion WHERE `USER-SUB`= '$usuario'";
                if ($resultado = $conexion -> query($consultaCOL)){
                //Determinamos numero tablas
                 $suscrito = $resultado -> num_rows;
                }

              //Cada vuelta pon la fila
?>
<tr>
    <td class="mdl-data-table__cell--non-numeric">
        <a href="perfil.php?user=<?php echo $usuario ?>"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><?php echo $usuario ?></div></a>
    </td>    
    <td><?php echo $suscrito ?></td>
    <td><?php echo $subsWEB ?></td>
    <td><?php echo $subs ?></td>
    <td class="mdl-data-table__cell--non-numeric">
        <a href="<?php echo $video ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Video</div></a>
    </td>
    <td class="mdl-data-table__cell--non-numeric">
        <?php
        //Variable $ya, sera true si esta suscrito / false si no lo esta
            if ($ya){
                echo '<a href="'.$link.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
            }   else  {
                echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribete</div></a>';
            }
        ?>
    </td>                
</tr>
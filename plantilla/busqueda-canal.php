<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="table-layout:fixed;width:100%;">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Canal</th>
                    <th>Suscrito</th>
                    <th>+ Subscriptores</th>
                    <th>Subscriptores YT</th>
                    <th class="mdl-data-table__cell--non-numeric">Video</th>
                    <th class="mdl-data-table__cell--non-numeric">Link</th>              
                </tr>
            </thead>
            <tbody>

<?php
//Tabla de canales, obten el numero de resultados a mostrar en $numRESULT  
            for ($i=0; $i < $numRESULT; $i++) {          
                //Consultar valores a BBDD
                $consulta = "SELECT * FROM usuarios ORDER BY `usuarios`.`SUBSCRITO` DESC LIMIT $i, 1 ";
                 $consulta = $conexion->query($consulta);  //Ejecuta la consultaN
                 $fila = $consulta->fetch_array();          //Mete los valores en el array $fila[]

              //Variables
              $usuario = $fila[1];
              $link = $fila[4];
              include './usuarios/obten-subsYT.php';
              $ya = false;
              $video = $fila[6];
              $link = $fila[4];

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
        <a href="perfil.php?user=<?php echo $usuario ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><?php echo $usuario ?></div></a>
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
                echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
            }   else  {
                echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribete</div></a>';
            }
        ?>
    </td>                
</tr>

    <?php
            }
    //Termina de poner todas las filas y finaliza la tabla

?>
    </tbody>
</table>
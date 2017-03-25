<?php 
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
?>


<div class="mdl-cell mdl-cell--4-col mdl-shadow--4dp mdl-color--white" style="padding:5px"><center><h4><strong><?php echo $usuario ?></strong></h4></center>
    <iframe height="200px" src="https://www.youtube.com/embed/<?php echo $videoID ?>?rel=0" frameborder="1" allowfullscreen></iframe>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect"><?php echo $fecha ?></button>
    <?php
    //Variable $ya, sera true si esta suscrito / false si no lo esta
        if ($ya){
            echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
        }   else  {
            echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribete</div></a>';
        }
    ?>  
    <a href="perfil.php?user=<?php echo $usuario ?>"><div class="mdl-button mdl-js-button mdl-button-raised mdl-button--colored mdl-js-ripple-effect"><?php echo $usuario ?></div></a>
</div>
<?php
//Obtiene numero de suscripciones conseguidas
        //Trozea link
        $trozo = explode("/", $perfilUser[4]);
        $linkID = $trozo[4];
        $consultaP = "SELECT * FROM subscripcion WHERE `USER-USER`='$linkID'";
        if ($resultado = $conexion -> query($consultaP)){
            //Determinamos numero tablas
            $numSUBS = $resultado -> num_rows;
        }      

//Obtiene subscripciones reales YT
        $link = $perfilUser[4];
        include './usuarios/obten-subsYT.php';       
?>

<div>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Suscripciones hechas:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $perfilUser[8]?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Suscripciones conseguidas:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $perfilUser[9] ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Suscriptores YouTube:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $subs ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Visitas:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $visitas ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Videos subidos:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $videos ?></strong>
        </span>
    </li>
</div>

<?php
    include './conexion.php';

    //Consultamos numero de filas (N Usuarios)
    $campos = "SELECT * FROM usuarios";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $users = $resultado -> num_rows;
    }

    //Consultamos numero de filas (N Suscripciones)
    $campos = "SELECT * FROM subscripcion";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $subs = $resultado -> num_rows;
    }
?>

<div>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Usuarios:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $users ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>subscripciones:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $subs ?></strong>
        </span>
    </li>
</div>

<?php

    if ($_SESSION['usuario'] == null){
        //No tiene ninguna sesion iniciada
        header("Location: usuario.php");
    }
?>
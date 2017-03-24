<?php
    session_start();

    if ($_SESSION['usuario'] != null){
      //Sesion puede continuar
    } else {
      header ('Location: index.php');
    }
?>
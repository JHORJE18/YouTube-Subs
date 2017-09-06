<?php
    session_start();

    if ($_SESSION['usuario'] != null){
      //Sesion puede continuar
      $usuarioActual = $_SESSION['usuario'];
      $check = "SELECT * FROM usuarios WHERE USUARIO = '$usuarioActual'";
        if ($resultado = $conexion -> query($check)){
              $obj = $resultado->fetch_array();          //Mete los valores en el array $fila[]

             if ($obj[10] >= $permiso){
                //Puede continuar
             }  else {
               header ('Location: index.php');
             }
        }
    } else {
      header ('Location: index.php');
    }
    
?>
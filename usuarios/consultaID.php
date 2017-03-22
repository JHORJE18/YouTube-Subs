<?php

  if ($usuarioNAME != null){
    //consulta la ID del usuario de la variable $usuarioNAME
    $consulta = "SELECT ID, USUARIO FROM usuarios WHERE USUARIO='$usuarioNAME'";
        $goConsulta = $conexion->query($consulta);  //Ejecuta la consultaN
        $userID = $goConsulta->fetch_array();          //Mete los valores en el array $fila[]
    //Devuelve el ID del usuario en $userID[0]
  } else if ($usuarioID != null){
    //consulta el nombre del usuario de la variable $usuarioID
    $consulta = "SELECT ID, USUARIO FROM usuarios WHERE ID='$usuarioID'";
        $goConsulta = $conexion->query($consulta);  //Ejecuta la consultaN
        $userID = $goConsulta->fetch_array();          //Mete los valores en el array $fila[]
    //Devuelve el ID del usuario en $userNAME[1]
  }
  
?>
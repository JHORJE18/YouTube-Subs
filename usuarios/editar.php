<?php

    //Vamos a editar datos
    if ($_REQUEST['editar'] != null){

        //Cambiar correo
        if ($_REQUEST['correo']){
            $correo = $_REQUEST['correo'];
            $sql = "UPDATE `usuarios` SET `CORREO` = '$correo' WHERE `usuarios`.`USUARIO` = '$perfilUser[1]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = "El correo ha sido cambiado correctamente <br>";
                $cambio = $cambio."\nCorreo: ".$_REQUEST['correo'];
            }   else {
                $mensaje = "El correo no se ha podido cambiar correctamente <br>";
            }
        }

        //Cambiar contraseña
        if ($_REQUEST['Ncontrasena']){
            $Ncontrasena = $_REQUEST['Ncontrasena'];
            $Acontrasena = $_REQUEST['Acontrasena'];

            if ($Acontrasena == $perfilUser[3]){
                //Antiguas contraseñas coinciden
                     //Procedemos a cambiarle la contraseña
                        $sql = "UPDATE `usuarios` SET `CONTRASENA` = '$Ncontrasena' WHERE `usuarios`.`USUARIO` = '$perfilUser[1]'";

                        //Introducir datos en BBDD
                        $result= $conexion -> query($sql);

                        if($result){
                            $mensaje = $mensaje."La contraseña ha sido cambiado correctamente <br>";
                            $cambio = $cambio."\nContraseña: ".$_REQUEST['Ncontrasena'];
                        }   else {
                            $mensaje = $mensaje."La contraseña no se ha podido cambiar correctamente <br>";
                        }
            }   else    {
                $mensaje = $mensaje."La anterior contraseña no coincide <br>";
            }
        }

        //Cambiar video
        if ($_REQUEST['video']){

            //Comprobar que video es válido
            $division = explode("/", $_REQUEST['video']);
            $linkVideoFORMATEADO = $division[3];

            if (substr_count($linkVideoFORMATEADO, "&") == 0){
                //Video valido
                    $video = $_REQUEST['video'];
                    $sql = "UPDATE `usuarios` SET `VIDEO` = '$video' WHERE `usuarios`.`USUARIO` = '$perfilUser[1]'";

                    //Introducir datos en BBDD
                    $result= $conexion -> query($sql);

                    if($result){
                        $mensaje = $mensaje."El video ha sido cambiado correctamente <br>";
                        $cambio = $cambio."\nVideo: ".$_REQUEST['video'];
                    }   else {
                        $mensaje = $mensaje.'El video no se ha podido cambiar correctamente, comprueba que el link es valido en <a href="yt.jhorje18.com/ayuda.php">Ayuda</a> <br>';
                    }
            }   else {
                //Video no valido
                $mensaje = $mensaje.'El enlace del video no es válido, comprueba si el enlace es válido en <a href="ayuda.php"?>AYUDA</a> <br>';
            }
        }

        //Notificamos los cambios
        $admin_email = "wiijlg@hotmail.com";
        $email = $_REQUEST['correo'];
        $subject = "Soporte YT Subs | Datos de la cuenta cambiados";
        $separa = "\n-------------------------\n";
        $texto = "Estos datos de tu cuenta han sido cambiados:".$cambio;
        $comment = $separa.$texto.$separa;

        //Enviar correo
        mail($email, "$subject", $comment, "From:" . $admin_email);

    }

        if ($_REQUEST['borrar'] != null){
            $mensaje = 'De momento si quieres borrar tu cuenta, debes indicarlo al soporte a traves de la <a href="contacto.php">pagina de contacto</a> <br>';
        }
?>

<?php
        //Si no hay cambios muestra el formulario
        if ($mensaje != null){
            echo '<span>'.$mensaje.'</span>';
            echo '<a href="perfil.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">backspace</i> Volver a mi perfil</div></a>';
        }   else {
?>
<form action="perfil.php?edit=1" method="post" class="add">

    <h3>Editar campos</h3>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="usuario" class="mdl-textfield__input" type="text" id="usuario" value="<?php echo $perfilUser[1] ?>" disabled>
        <label class="mdl-textfield__label" for="usuario">Usuario</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="correo" class="mdl-textfield__input" type="text" id="correo" value="<?php echo $perfilUser[2] ?>">
        <label class="mdl-textfield__label" for="correo">Correo</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="link" class="mdl-textfield__input" type="text" id="link" value="<?php echo $perfilUser[4] ?>" disabled>
        <label class="mdl-textfield__label" for="link">Link del canal</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="video" class="mdl-textfield__input" type="text" id="video" value="<?php echo $perfilUser[6] ?>">
        <label class="mdl-textfield__label" for="video">Video del canal</label>
    </div>
    <hr>
    <h4>Contraseña</h4>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="Ncontrasena" class="mdl-textfield__input" type="password" id="Ncontrasena">
        <label class="mdl-textfield__label" for="Ncontrasena">Nueva contraseña</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
        <input name="Acontrasena" class="mdl-textfield__input" type="password" id="Acontrasena">
        <label class="mdl-textfield__label" for="Acontrasena">Anterior contraseña</label>
    </div>
    <hr>
    <div>
        <input type="submit" name="editar" value="editar" id="editar" class="mdl-button mdl-js-button mdl-button--colored">
        <input type="submit" name="borrar" value="Borrar perfil" id="borrar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
    </div><br>
</form>

        <?php } ?>
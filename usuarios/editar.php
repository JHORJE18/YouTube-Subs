<?php

    //Vamos a editar datos
    if ($_REQUEST['editar'] != null){

        //Cambiar nombre
        if ($_REQUEST['nombre']){
            $nombre = $_REQUEST['nombre'];
            $sql = "UPDATE `usuarios` SET `NOMBRE` = '$nombre' WHERE `usuarios`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."El nombre ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."El nombre no se ha podido cambiar correctamente <br>";
            }
        }

        //Cambiar apedillo
        if ($_REQUEST['apedillo']){
            $apedillo = $_REQUEST['apedillo'];
            $sql = "UPDATE `usuarios` SET `APEDILLOS` = '$apedillo' WHERE `usuarios`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."El apedillo ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."El apedillo no se ha podido cambiar correctamente <br>";
            }
        }

        //Cambiar foto
        if ($_REQUEST['foto']){
            $foto = $_REQUEST['foto'];
            $sql = "UPDATE `usuarios` SET `FOTO` = '$foto' WHERE `usuarios`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."La foto ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."La foto no se ha podido cambiar correctamente <br>";
            }
        }

        //Facebook
        if ($_REQUEST['facebook']){
            $facebook = $_REQUEST['facebook'];
            $sql = "UPDATE `redes_sociales` SET `FACEBOOK` = '$facebook' WHERE `ID_USUARIO` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."Facebook ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."Facebook no se ha podido cambiar correctamente <br>";
            }
        }

        //Twitter
        if ($_REQUEST['twitter']){
            $twitter = $_REQUEST['twitter'];
            $sql = "UPDATE `redes_sociales` SET `TWITTER` = '$twitter' WHERE `ID_USUARIO` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."Twitter ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."Twitter no se ha podido cambiar correctamente <br>";
            }
        }

        //Instagram
        if ($_REQUEST['instagram']){
            $instagram = $_REQUEST['instagram'];
            $sql = "UPDATE `redes_sociales` SET `INSTAGRAM` = '$instagram' WHERE `ID_USUARIO` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."Instagram ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."Instagram no se ha podido cambiar correctamente <br>";
            }
        }

        //YouTube
        if ($_REQUEST['youtube']){
            $youtube = $_REQUEST['youtube'];
            $sql = "UPDATE `redes_sociales` SET `YOUTUBE` = '$youtube' WHERE `ID_USUARIO` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."YouTube ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."YouTube no se ha podido cambiar correctamente <br>";
            }
        }

    }

    //Vamos a obtener las redes sociales
    //Obten redes sociales
            $sql = ("SELECT * FROM  `redes_sociales` WHERE  `ID_USUARIO` =  '$perfilUser[0]'");
            $resultado = $conexion -> query($sql);

                $red = $resultado->fetch_array();
                $cont = $resultado->num_rows;

            if (cont != 0){
                echo 'No esta vacio el red'.$cont;
            }   else {
                $sql = "INSERT INTO `redes_sociales` (`ID_USUARIO`) VALUES ('$perfilUser[0]');";
                $resultado = $conexion -> query($sql);

                if ($resultado){
                    echo 'Se ha creado las posiblidad para añadir redes sociales';
                }   else {
                    echo 'No puedo crearte la tabla para redes sociales';
                }
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
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="nombre" class="mdl-textfield__input" type="text" id="nombre" value="<?php echo $perfilUser[2] ?>">
        <label class="mdl-textfield__label" for="nombre">Nombre</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="apedillo" class="mdl-textfield__input" type="text" id="apedillo" value="<?php echo $perfilUser[3] ?>">
        <label class="mdl-textfield__label" for="apedillo">Apedillos</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="foto" class="mdl-textfield__input" type="text" id="foto" value="<?php echo $perfilUser[6] ?>">
        <label class="mdl-textfield__label" for="foto">URL Foto perfil</label>
    </div>
    <hr>
    <h3>Redes Sociales</h3>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="facebook" class="mdl-textfield__input" type="text" id="facebook" value="<?php echo $red[1] ?>">
        <label class="mdl-textfield__label" for="facebook">Perfil Facebook</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="twitter" class="mdl-textfield__input" type="text" id="twitter" value="<?php echo $red[2] ?>">
        <label class="mdl-textfield__label" for="twitter">Perfil Twitter</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="instagram" class="mdl-textfield__input" type="text" id="instagram" value="<?php echo $red[3] ?>">
        <label class="mdl-textfield__label" for="instagram">Perfil Instagram</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="youtube" class="mdl-textfield__input" type="text" id="youtube" value="<?php echo $red[4] ?>">
        <label class="mdl-textfield__label" for="youtube">Perfil YouTube</label>
    </div>
    <hr>
    <div>
        <input type="submit" name="editar" value="editar" id="editar" class="mdl-button mdl-js-button mdl-button--colored">
    </div><br>
</form>

        <?php } ?>

<?php

    $mensaje = null;

        //Si se recibe un usuario introducido
        if ($_POST['perfil'] != null ){

            $user = $_POST['perfil'];
            $consulta = "SELECT * FROM usuarios WHERE USUARIO = '$user'";
            if ($resultado = $conexion->query($consulta)){
                $obj = $resultado->fetch_array();

                if ($obj != null){
                    //Mostrar info Usuario
                    echo '<div class="mdl-shadow--4dp mdl-cell mdl-cell--12-col mdl-color--white"><div class="mdl-grid">';
                ?>

            <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
                Usuario: <?php echo $obj[1] ?>
            </center></div>

            <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <h1><?php echo $obj[1] ?></h1>
                </div>

                <div class="mdl-cell mdl-cell--12-col">
                    <hr>
                        <span>Nombre: <?php echo $obj[1] ?></spanh><br>
                        <span>Link canal: <?php echo $obj[4] ?></span><br>
                        <span>Video: <?php echo $obj[6] ?></span><br>
                        <span>Fecha registro: <?php echo $obj[7] ?></span><br>
                    <hr>

                    <?php
                    //Video
                    $division = explode("=", $obj[6]);
                    $videoID = end($division);
                    ?>
                    <iframe height="400px" src="https://www.youtube.com/embed/<?php echo $videoID?>?rel=0" frameborder="1" allowfullscreen></iframe>
                </div>
            </div>
            </div>

            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
                    <img src="<?php echo $obj[5] ?>" style="width: 100%">
                </div>
            </div>

            <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--accent">Reportes</div>

                    <?php
                        $numRep = "SELECT * FROM reportes WHERE `USER-REP` = '$obj[1]'";
                        if ($resultado = $conexion->query($numRep)){
                            $num = $resultado->num_rows;

                            if ($num > 0){
                                //Con reportes recibidos
                                for ($i=0; $i < $num; $i++){
                                    $mostrar = $numRep.' LIMIT '. $i . ' ,1';
                                    if ($result = $conexion->query($mostrar)){
                                        $card = $result->fetch_array();

                                        include './plantilla/ADMIN/reporteCARD.php';
                                    }
                                }
                            } else {
                                //Sin reportes recibidos
                                echo '<div class="mdl-cell mdl-cell--12-col"><h3><center>No ha recibido ningun reporte</center></h3></div>';
                            }
                        }
                    ?>

                </div>
            </div>

            <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
                Usuario: <?php echo $obj[1] ?>
            </center></div>

                <?php
                    echo '</div></div>';
                } else {
                    $mensaje = "No se ha encontrado al usuario <strong>". $user .'</strong>';
                }
            } else {
                $mensaje = "No se ha podido realizar la consulta";
            }

            if ($mensaje != null){

                echo '<div class="mdl-shadow--4dp mdl-cell mdl-cell--12-col mdl-color--white"><div class="mdl-grid"><div class="mdl-cell mdl-cell--12-col mdl-color--white">';
                echo '<span>'.$mensaje.'</span>';
                echo '</div></div></div>';
            }

        }   else {
        //Usuario vacio
?>

    <!--Usuario vacio-->
    <div class="mdl-shadow--4dp mdl-cell mdl-cell--12-col mdl-color--white">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-color--white">
                <h3>Introduce el nombre del usuario a revisar</h3>
            </div>

            <div class="mdl-cell mdl-cell--12-col mdl-color--white">
                <form action="admin.php?ver=USER" method="post">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
                    <input name="perfil" class="mdl-textfield__input" type="text" id="perfil">
                    <label class="mdl-textfield__label" for="perfil">Usuario</label>
                </div>

                <input type="submit" name="buscar" value="Buscar" id="buscar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                </form>
            </div>
        </div>
    </div>

<?php
        }

?>
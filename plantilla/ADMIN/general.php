        <!--ADMINISTRADOR-->
        <div class="mdl-shadow--4dp mdl-cell mdl-cell--8-col mdl-color--white">

        <?php 
            //Consultar reportes no respondidos
            $consultNR = "SELECT * FROM reportes WHERE ESTADO = '1'";
            if ($resultado = $conexion -> query($consultNR)){
                $numRep = $resultado->num_rows;
            }

        ?>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <span class="mdl-badge" data-badge="<?php echo $numRep ?>"><strong>Reportes pendientes</strong></span>
                    <hr>
                </div>

                <?php 
                    if ($numRep > 0){
                        for ($i=0; $i<$numRep; $i++){
                            $mostrarREP = $consultNR. " LIMIT ". $i . " , 1";
                            if ($resulta = $conexion -> query($mostrarREP)){
                                $obj = $resulta->fetch_array();

                                include './plantilla/ADMIN/reporteCARD.php';
                            }
                        }
                    } else {
                        echo '<div class="mdl-cell mdl-cell--12-col"><h2><center>No hay reportes que revisar</center></h2></div>';
                    }

                ?>

            </div>
        </div>
 
        <!--ESTADISTICAS-->
        <div class="mdl-shadow--4dp mdl-cell mdl-cell--4-col mdl-color--white">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                    Estadisticas
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <?php include './plantilla/estadisticas.php' ?>
                    <hr>
                    <?php include './plantilla/ADMIN/estadisticas.php' ?>
                </div>
            </div>
        </div>

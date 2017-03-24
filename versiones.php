<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

  $seccion = "Versiones";

      include './plantilla/cabezera.php';

      $consultaV = "SELECT * FROM version ORDER BY  `version`.`ID` DESC";
              if ($resultado = $conexion -> query ($consultaV)){
                    $fila = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                    $versionULTIMA = $fila[1];
              }
      ?>



    <title>YT Subs | <?php echo $seccion; ?></title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './plantilla/cabezera-body.php';
        include './plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Versión v<?php echo $versionULTIMA ?>
          </center></div>

            <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white" style="padding:10px">
                <h3>Ultimas novedades Web</h3>
                <?php 
    //Calcula total de versiones a mostrar
      $consultaV = "SELECT * FROM version ORDER BY  `version`.`ID` DESC";
              if ($resultado = $conexion -> query ($consultaV)){
                    $numTotalV = $resultado -> num_rows;          //Mete los valores en el array $fila[]
              }
              for ($i=0; $i<$numTotalV; $i++){
                  $verVERSION = "SELECT * FROM version ORDER BY `version`.`ID` DESC LIMIT ".$i.", 1";
                  if ($resto = $conexion->query($verVERSION)){
                      $versionLINEA = $resto->fetch_array();
                      
                      //Variables
                      $version = $versionLINEA[1];
                      $titulo = $versionLINEA[2];
                      $texto = $versionLINEA[3];
                      $fecha = $versionLINEA[4];

                      echo '<hr>';
                      include './plantilla/version.php';
                  }
              }
              echo '<hr>';
                ?>
            </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Versión v<?php echo $versionULTIMA ?>
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

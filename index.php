<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';
          include 'conexion.php';

          //Cual es la IP?
          $ip =  $_SERVER['REMOTE_ADDR'];
          //Cual es el usuario actual?
          if ($_SESSION['usuario'] != null){
            $sesion = $_SESSION['usuario'];
          } else {
            $sesion = "Invitado";
          }
          
          //Añadimos nueva visita por ver esto
            $momento = date("Y-m-d/H:i:s");
            $visita = "INSERT INTO views (MOMENTO, IP, USUARIO)  VALUES('$momento', '$ip', '$sesion')";

                    //Introducir datos en BBDD
                  $result= $conexion -> query($visita);

          //Obten ultima version
           $consultaV = "SELECT * FROM version ORDER BY  `version`.`ID` DESC";
              if ($resultado = $conexion -> query ($consultaV)){
                    $fila = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                    $versionULTIMA = $fila[1];
              }


    $seccion = "Inicio" ?>

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
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <a href="suscriptores.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people_outline</i>suscriptores</div></a>
            <a href="suscribirse.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people</i>Suscribirse</div></a>
            <a href="#"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Videos de suscriptores</div></a>
          </div>

          <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="mdl-grid">
              <?php include './plantilla/bienvenido.php';?>
            </div>
          </div>

          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">YT Sub Random</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                  En esta web puedes suscribirte a canales que les gustaría tener mas seguidores, por supuesto tu decides si quieres suscribirte.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="contruccion.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Investigar mas</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                  Estadisticas
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                        <?php include './plantilla/estadisticas.php' ?>
                </div>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--4dp mdl-cell mdl-cell--4-col mdl-cell--12-col mdl-color--white">
              <div class="mdl-grid"><center>
                    <a href="versiones.php"><div class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">settings_backup_restore</i>Versión actual v <?php echo $versionULTIMA?></div></a>
              </center></div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--4dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-grid">
                <!--ANUNCIO-->
                    <script type="text/javascript">
                      ( function() {
                        if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
                        var unit = {"calltype":"async[2]","publisher":"jhorje18","width":320,"height":50,"sid":"Chitika Default"};
                        var placement_id = window.CHITIKA.units.length;
                        window.CHITIKA.units.push(unit);
                        document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
                    }());
                    </script>
                    <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>

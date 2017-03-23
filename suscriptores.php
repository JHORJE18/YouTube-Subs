<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';
  $seccion = "Tus suscriptores";

      include './plantilla/cabezera.php';
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
            Esta gente maja se ha suscrito a tu canal
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp">
        <?php
          //Tabla canales  
            include './plantilla/suscriptores-micanal.php'; ?>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Esta gente maja se ha suscrito a tu canal
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

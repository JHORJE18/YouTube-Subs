<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';
             include 'conexion.php';
             $permiso = 4;
             include 'seguridad.php';

    $seccion = "Zona Administrador" ?>

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
            <i class="material-icons">security</i> Zona Administrador
        </center></div>

        <?php
        
        ?>

        <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            <i class="material-icons">security</i> Zona Administrador
        </center></div>

        </div>
      </main>
    </div>
  </body>
</html>
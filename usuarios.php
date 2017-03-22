<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';

    $seccion = "Inicio sesion / Registro" ?>

    <title>Vota | <?php echo $seccion; ?></title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './plantilla/cabezera-body.php';
        include './plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">
          <?php include 'guest-user.php'; ?>

        </div>
      </main>
    </div>
  </body>
</html>

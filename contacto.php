<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

      //Buscando en pagina contreta
      if (isset($_GET['pag'])){
        $pag = $_GET['pag'];
      } else {
        $pag = 1;
      }
      
      //Total columnas resultados
      $totalMAX = 58;

      //Limite de 50 resultados por pagina
      $consultaPAG = $totalMAX / 50;

      $maxPAG = $consultaPAG;

          //Elimina decimal al superior
                if (round($maxPAG, 0, PHP_ROUND_HALF_UP) != $maxPAG){
                  $maxPAG = round($maxPAG, 0, PHP_ROUND_HALF_UP);
                  $maxPAG++;
                } else {
                  $maxPAG = round($maxPAG, 0, PHP_ROUND_HALF_UP);
                }

      //Si la pagina de la URL supera paginas dispondibles
      if ($pag > $maxPAG){
        $busca = null;
        $seccion = "Buscando lo imposible";
      } else {
          $seccion = "Suscibiendose";
      }

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
            Contactar
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
    <div class="mld-grid mdl-cell mdl-cell--12-col">
        <h1>Contacta con el soporte</h1>
        <hr>
        <a href="mailto:wiijlg@hotmail.com"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">email</i>Correo Electronico</div></a>
        <a href="http://www.forocoches.com/foro/showthread.php?t=5508434&highlight="><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">forum</i>Foro</div></a>
        <br>
        <div id="p" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
    </div>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Contactar
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

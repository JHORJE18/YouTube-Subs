<!doctype html>
<html lang="es">
  <head>

  <?php
      //Obten lo que esta buscando
      if (isset($_REQUEST['buscar'])) {
        $busca = $_REQUEST['buscar'];
        $seccion = "Busqueda: ".$busca;
      }   else if (isset ($_GET['busca'])) {
        $busca = $_GET['busca'];
        $seccion = "Busqueda: ".$busca;
      } else {
        $busca = null;
        $seccion = "Buscando nada";
      }

      //Buscando en pagina contreta
      if (isset($_GET['pag'])){
        $pag = $_GET['pag'];
      } else {
        $pag = 1;
      }
      
      //Total columnas resultados
      $totalMAX = 32;

      //Limite de 10 resultados por pagina
      $consultaPAG = $totalMAX / 10;

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
            Resultados busqueda <?php echo $seccion; ?>
          </center></div>

<?php
    if ($busca != null){
?>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp">
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Canal</th>
                    <th>Suscripciones</th>
                    <th>+ suscriptores</th>
                    <th>suscriptores YT</th>
                    <th class="mdl-data-table__cell--non-numeric">Video</th>
                    <th class="mdl-data-table__cell--non-numeric">Link</th>              
                </tr>
            </thead>
            <tbody>

        <?php
          //Busqueda canales  
            for ($i=0; $i < 10; $i++) {
              //Variables
              $usuario = "JHORJE18";
              $suscripciones = 18;
              $subs = 10;
              $subsYT = 210;
              $video = "https://www.youtube.com/watch?v=2wWC3m9i0wY";
              $link = "https://www.youtube.com/channel/UC57XOrOWOWW4XN-W22s5UrQ";

              include './plantilla/busqueda-canal.php';
            }
           ?>
            </tbody>
        </table>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white"><center>
            Pagina <?php
                      for ($i=1; $i<=$maxPAG; $i++){
                        //Muestra botones
                        echo '<a href="./buscar.php?busca='.$busca.'&pag='.$i.'"><div class="mdl-button mdl-js-button mdl-js-ripple-effect';
                          if ($i != $pag){
                            echo ' mdl-button--accent">'.$i.'</div></a>';
                          } else {
                            echo ' mdl-button--colored">'.$i.'</div></a>';
                          }
                      }

                    ?>
          </center></div>

          <?php
              } else {
                for ($i=0; $i < 10; $i++){
                  echo '<div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-js-button mdl-button--icon">Macho esta URL esta mal</div>';
                }
              }
          ?>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Resultados busqueda <?php echo $seccion; ?>
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

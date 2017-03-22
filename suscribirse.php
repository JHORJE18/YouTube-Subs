<!doctype html>
<html lang="es">
  <head>

  <?php

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
      } else {
          $seccion = "Suscibiendose";
      }

      include './plantilla/cabezera.php';
      ?>



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
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Suscribete a estos canales
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp">
        <?php
          //Tabla canales  
          $numRESULT = 20;
              include './plantilla/busqueda-canal.php'; ?>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white"><center>
            Pagina <?php
                      for ($i=1; $i<=$maxPAG; $i++){
                        //Muestra botones
                        echo '<a href="./suscribirse.php?busca='.$busca.'&pag='.$i.'"><div class="mdl-button mdl-js-button mdl-js-ripple-effect';
                          if ($i != $pag){
                            echo ' mdl-button--accent">'.$i.'</div></a>';
                          } else {
                            echo ' mdl-button--colored">'.$i.'</div></a>';
                          }
                      }

                    ?>
          </center></div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Suscribete a estos canales
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

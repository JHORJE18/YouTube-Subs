<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';
  $seccion = "Tus suscriptores";

  //Limito la busqueda
      $TAMANO_PAGINA = 10;

      //Examino la pagina a mostrar
      $pagina = $_GET['pag'];
      if (!$pagina){
        $inicio = 0;
        $pagina = 1;
      } else  {
        $inicio = ($pagina -1) * $TAMANO_PAGINA;
      }

      //Miro numero de campos
      $consultaCAMPOS = "SELECT * FROM usuarios";
                if ($resultado = $conexion -> query($consultaCAMPOS)){
                    //Determinamos numero tablas
                    $num_total_reg = $resultado -> num_rows;
                }
      //Calculo total de paginas
      $total_paginas = ceil($num_total_reg / $TAMANO_PAGINA);

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
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--accent"><center>
            PAGINA NO TERMINADA
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp">
        <?php
              //Principio de la tabla
              include './plantilla/tabla/cabezera.php';

         //Sentencia SQL
        $criterio = "ORDER BY SUBSCRITO DESC";
        $maxREG = $inicio + $TAMANO_PAGINA;
        while ($inicio < $maxREG){
              $consulta = "SELECT * FROM usuarios ".$criterio." limit ".$inicio.",".$TAMANO_PAGINA;
              if ($resultado = $conexion -> query($consulta)){
                    $obj = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                    if ($obj != null){
                      //Obtiene los datos
                      $sesion = $_SESSION['usuario'];
                      $usuario = $obj[1];
                      $link = $obj[4];
                      $subs = $obj[9];
                      $video = $obj[6];

                      include './plantilla/tabla/fila.php';
                    }
              }
              $inicio++;
        }
              //Fin de la tabla
              include './plantilla/tabla/fin.php';
             ?>
    </div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
            <span>  Pagina</span> <?php
                      for ($i=1; $i<=$total_paginas; $i++){
                        //Muestra botones
                        echo '<a href="./suscribirse.php?pag='.$i.'"><div class="mdl-button mdl-js-button mdl-js-ripple-effect';
                          if ($i != $pagina){
                            echo ' mdl-button--accent">'.$i.'</div></a>';
                          } else {
                            echo 'mdl-button--raised mdl-button--colored">'.$i.'</div></a>';
                          }
                      }

                    ?>
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

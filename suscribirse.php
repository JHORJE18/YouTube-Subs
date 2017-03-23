<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

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
      echo 'Numero registros encontrados: '.$num_total_reg.'<br>';
      echo 'Se muestran paginas de '.$TAMANO_PAGINA.' registros cada una <br>';
      echo 'Mostrando la pagina'.$pagina.' de '.$total_paginas.'<br>';

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
            Suscribete a estos canales
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp">
        <?php
              //Principio de la tabla
              include './plantilla/tabla/cabezera.php';

         //Sentencia SQL
        $criterio = "ORDER BY SUBSCRITO ASC";
        $consulta = "SELECT * FROM usuarios ".$criterio." limit ".$inicio.",".$TAMANO_PAGINA;
        echo $consulta.'<br>';
        if ($resultado = $conexion -> query($consulta)){
          if ($count = $resultado->num_rows){
            //Obtiene array de objetos
            while ($obj = $resultado->fetch_object()){
                //Obtiene los datos
                $sesion = $_SESSION['usuario'];
                $usuario = $obj->USUARIO;
                $link = $obj->LINK;
                $subs = $obj->SUBS;
                $video = $obj->VIDEO;

                include './plantilla/tabla/fila.php';
            }
          }
        }
              //Fin de la tabla
              include './plantilla/tabla/fin.php';
             ?>
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

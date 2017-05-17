<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';
          include './conexion.php';

    if ($_GET['user'] !=  null){
      //Quiere ver a un usuario
      $usuarioVER = $_GET['user'];
    } else if (isset($_SESSION['usuario'])){
      $usuarioVER = $_SESSION['usuario'];
    } else {
      header ('Location: index.php');
    }

    //Si el usuario quiere editar la pagina, muestrale lo administrativo, comprobanod que sea el mismo
    if (($_GET['edit'] != null) && ($usuarioVER = $_SESSION['usuario'])){
      $editV = true;
    } else {
      $editV = false;
    }

    //Obten datos usuario
            $consultaImagenUsuario = ("SELECT * FROM  `usuarios` WHERE  `USUARIO` =  '$usuarioVER'");
            $resultado = $conexion -> query($consultaImagenUsuario);

                $perfilUser = $resultado->fetch_array();
              
              if ($perfilUser[5] == null){
                $perfilUser[5] = "imagenes/user.jpg";
              }

        //Sacamos canal ID
        $canalID = $perfilUser[4];

        //Comprueba si estas suscrito
            $sesion = $_SESSION['usuario'];
            $suscritoYA = "SELECT * FROM `subscripcion` WHERE `USER-SUB` = '$sesion' AND `USER-USER` = '$canalID'";
                if ($resultado = $conexion -> query($suscritoYA)){
                //Determinamos numero tablas
                 $numYA = $resultado -> num_rows;
                }

                if ($numYA != null){
                    $ya = true;
                }   else    {
                    $ya = false;
                }

          $seccion = $usuarioVER;
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
            Perfil: <?php echo $usuarioVER ?>
          </center></div>

          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <a href="suscriptores.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people_outline</i>suscriptores</div></a>
            <a href="suscribirse.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people</i>Suscribirse</div></a>
            <a href="videos-subs.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Videos de suscriptores</div></a>
            <?php if ($usuarioVER == $_SESSION['usuario']) {
            echo '<a href="perfil.php?edit=1"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">edit</i>Editar Perfil</div></a>';
            } ?>
          </div>

          <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="mdl-grid">
              <?php
                  echo '<div class="mdl-cell mdl-cell--12-col">';
                  echo '<h1>'.$usuarioVER.'</h1>';
                  echo "<hr>";

            //Mostrar panel de editor
            if ($editV){
                include './usuarios/editar.php';
            } else {
              //Mostrar panel de usuarios ?>

              <span>Nombre: <?php echo $perfilUser[1] ?></spanh><br>
              <span>Link canal: <?php echo $perfilUser[4] ?></span><br>
              <span>Video: <?php echo $perfilUser[6] ?></span><br>
              <span>Fecha registro: <?php echo $perfilUser[7] ?></span><br>
              <hr>

              <?php
              //Video
              $division = explode("=", $perfilUser[6]);
              $videoID = end($division);
              ?>
              <iframe height="400px" src="https://www.youtube.com/embed/<?php echo $videoID?>?rel=0" frameborder="1" allowfullscreen></iframe>

              <hr>
                <a href="<?php echo $perfilUser[6] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Video</div></a>
                          <?php
                          //Variable $ya, sera true si esta suscrito / false si no lo esta
                              if ($ya){
                                  echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
                              }   else  {
                                  echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribete</div></a>';
                              }
                          ?>  
                <a href="reportes.php?perfil=<?php echo $usuarioVER ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="material-icons" style="color: red">report</i>Reportar<i class="material-icons" style="color: red">report</i></div></a>              
            <hr>
                      <!--ANUNCIO-->
                      <script type="text/javascript">
                      ( function() {
                        if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
                        var unit = {"calltype":"async[2]","publisher":"jhorje18","width":728,"height":90,"sid":"Chitika Default"};
                        var placement_id = window.CHITIKA.units.length;
                        window.CHITIKA.units.push(unit);
                        document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
                    }());
                    </script>
                    <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
         <?php   }

            echo '</div>';
              ?>
            </div>
            
          </div>

          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <img src="<?php echo $perfilUser[5] ?>" style="width: 100%">
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">@<?php echo $usuarioVER ?></h2>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                  <a href="<?php echo $perfilUser[6] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Video</div></a>
                    <?php
                    //Variable $ya, sera true si esta suscrito / false si no lo esta
                        if ($ya){
                            echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
                        }   else  {
                            echo '<a href="nuevoSub.php?canal='.$canalID.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribete</div></a>';
                        }
                    ?>
            </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                  Estadisticas
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                        <?php        
                        include './usuarios/estadisticas.php' ?>
                </div>
              </div>
            </div>
          </div>

          
          </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Perfil: <?php echo $usuarioVER ?>
          </center></div>
        </div>
      </main>
    </div>
  </body>
</html>

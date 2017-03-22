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
              
              if ($perfilUser[6] == null){
                $perfilUser[6] = "imagenes/user.jpg";
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
            <?php echo $usuarioVER ?>
          </center></div>

          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people_outline</i>Subscriptores</div></a>
            <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">people</i>Suscribirse</div></a>
            <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Videos de Subscriptores</div></a>
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
              <span>Correo: <?php echo $perfilUser[2] ?></span><br>
              <span>Link canal: <?php echo $perfilUser[4] ?></span><br>
              <span>Video: <?php echo $perfilUser[6] ?></span><br>
              <span>Fecha registro: <?php echo $perfilUser[7] ?></span><br>

              <hr>
                <a href="<?php echo $perfilUser[6] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Video</div></a>
                <a href="<?php echo $perfilUser[7] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">arrow_forward</i>Suscribirse</div></a>

         <?php   }

            echo '</div>';
              ?>
            </div>
            
          </div>

          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="mdl-shadow--4dp mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <img src="<?php echo $perfilUser[6] ?>" style="width: 100%">
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">@<?php echo $usuarioVER ?></h2>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                  <a href="<?php echo $perfilUser[6] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">movie</i>Video</div></a>
                  <a href="<?php echo $perfilUser[7] ?>"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">arrow_forward</i>Suscribirse</div></a>
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
                        include './cositas/estadisticas.php' ?>
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

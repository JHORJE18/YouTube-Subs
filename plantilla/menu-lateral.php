<?php
include 'conexion.php';

      if (isset($_SESSION['usuario'])) {
          //Sesion Abierta
          $usuario = $_SESSION['usuario'];

                //Obten imagen
                $consultaFoto = ("SELECT FOTO FROM  `usuarios` WHERE  `USUARIO` =  '$usuario'");
                $resultadoFoto = $conexion -> query($consultaFoto);

                    $perfilUserOTO = $resultadoFoto->fetch_array();

          $imagenUsuario = $perfilUserOTO[0];
      }   else {
          $usuario = "Invitado";
          $imagenUsuario = "imagenes/user.jpg";
      }
 ?>

<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
  <header class="demo-drawer-header">
    <img src="<?php echo $imagenUsuario; ?>" class="demo-avatar">
    <div class="demo-avatar-dropdown">
      <span style="font-size: 18px">@<?php echo $usuario; ?></span>
      <div class="mdl-layout-spacer"></div>
      <button id="opcionesBA" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-button--accent">
        <i class="material-icons" role="presentation">arrow_drop_down</i>
        <span class="visuallyhidden">Opciones</span>
      </button>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="opcionesBA">
          <?php
                //Si tiene sesion abierta, muestra cerrar sesion, sino Registrarse / Iniciar sesion
              if(isset($_SESSION['usuario'])){
                  echo '<li class="mdl-menu__item"><a href="logout.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">close</i> Cerrar Sesión</a></li>';
              }   else    {
                  echo '<li class="mdl-menu__item"><a href="usuarios.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">account_box</i> Iniciar Sesión</a></li>';
                  echo '<li class="mdl-menu__item"><a href="usuarios.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">face</i> Crear cuenta</a></li>';
              }
          ?>
      </ul>
    </div>
  </header>
  <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
    <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Inicio</a>
    <a class="mdl-navigation__link" href="perfil.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_box</i>Perfil</a>
    <a class="mdl-navigation__link" href="suscriptores.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people_outline</i>Suscriptores</a>
    <a class="mdl-navigation__link" href="suscribirse.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Suscribirse</a>
    <a class="mdl-navigation__link" href="videos-subs.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">movie</i>Videos de usuarios</a>
    <a class="mdl-navigation__link" href="reportes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Reportes</a>
    <a class="mdl-navigation__link" href="versiones.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings_backup_restore</i>Versiones</a>
    <a class="mdl-navigation__link" href="contacto.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">contacts</i>Contacto</a>
    <div class="mdl-layout-spacer"></div>
    <a class="mdl-navigation__link" href="ayuda.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Ayuda</span></a>
  </nav>
</div>

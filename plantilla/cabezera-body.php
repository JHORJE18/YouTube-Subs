<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
  <div class="mdl-layout__header-row">
    <span class="mdl-layout-title"><?php echo $seccion; ?></span>
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
      <label class="mdl-button mdl-js-button mdl-button--icon" for="buscar">
        <i class="material-icons">search</i>
      </label>
      <div class="mdl-textfield__expandable-holder">
        <form method="post" action="buscar.php">
            <input class="mdl-textfield__input" name="buscar" type="text" id="buscar">
            <label class="mdl-textfield__label" for="buscar">Buscar preguntas...</label>
        </form>
      </div>
    </div>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
      <i class="material-icons">more_vert</i>
    </button>
    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
      <li class="mdl-menu__item">Contacto</li>
      <li class="mdl-menu__item">Informacion</li>
      <hr>

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

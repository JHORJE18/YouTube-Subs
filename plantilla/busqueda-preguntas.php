<div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
      <span style="float:right"><?php echo $fecha.' / '.$fecha_limite; ?></span>
      <a href="perfil.php?user=<?php echo $usuario ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">account_box</i>
      @<?php echo $usuario; ?>  </div></a>
      <hr>
      <span align="center"><?php echo $pregunta ?></span>
    </div>

    <div class="mdl-cell mdl-cell--5-col mdl-shadow--4dp" style="padding: 5px;background-color:red; color:white"><center>
      <span><?php echo $opcionA; ?></span>
    </div>
    <div class="mdl-cell mdl-cell--5-col mdl-shadow--4dp" style="padding: 5px;background-color:blue; color:white"><center>
      <span><?php echo $opcionB; ?></span></center>
    </div>
    <div class="mdl-cell mdl-cell--2-col">
      <a href="pregunta.php?ID=<?php echo $id; ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #<?php echo $id; ?></div></a>
      <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">bookmark_border</i> #Prueba</div></a>
    </div>
  </div>
</div>

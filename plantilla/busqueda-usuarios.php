<div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
  <div class="mdl-grid">

      <div class="mdl-cell mdl-cell--12-col">
        <span style="float:right">
          <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">verified_user</i>
          #ADMINISTRADOR</div></a>
        </span>
          <a href="perfil.php?user=<?php echo $usuario ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">account_box</i>
          @<?php echo $usuario; ?>  </div></a>

          <!-- Menu opciones borde izquierdo -->

          <hr>
      </div>

      <div class="mdl-cell mdl-cell--4-col">
          <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Últimas respuestas</button>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #25</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #12</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #576</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #888</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #985</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #133</div></a>
      </div>

      <div class="mdl-cell mdl-cell--4-col">
          <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Valoracion comunidad</button>
          <span style="float:right">100 <i class="material-icons">thumb_down</i></span><i class="material-icons">thumb_up</i> 800 

                      <div id="likes<?php echo $i ?>" class="mdl-progress mdl-js-progress" style="width: 100%"></div>
                          <script>
                              document.querySelector('#likes<?php echo $i ?>').addEventListener('mdl-componentupgraded', function() {
                              this.MaterialProgress.setProgress(88);
                              });
                          </script>

          <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">people</i>
          520 Amigos</div></a>
      </div>

      <div class="mdl-cell mdl-cell--4-col">
          <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Redes Sociales</button>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect" disabled><i class="material-icons">arrow_forward</i> Facebook</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Twitter</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Instagram</div></a>
          <a href="#"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect" disabled><i class="material-icons">arrow_forward</i> YouTube</div></a>
      </div>
  </div>
</div>

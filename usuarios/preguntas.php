<div>

  <?php
      $n = 5;

      for ($i=0; $i < $n; $i++) {
        $preguntaCorta = "Que Prefieres ser devorado...";
        $id = 4;

        echo '<li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
                <span>'.$preguntaCorta.'</span>
            </span>
            <span class="mdl-list__item-secondary-content">
                <a href="pregunta.php?ID='.$id.'"><button class="mdl-button mdl-js-button">ID#'.$id.'</button></a>
            </span>
        </li>';
      }
   ?>

</div>

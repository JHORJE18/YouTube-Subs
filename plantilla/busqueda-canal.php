<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Canal</th>
                    <th>Suscripciones</th>
                    <th>+ Subscriptores</th>
                    <th>Subscriptores YT</th>
                    <th class="mdl-data-table__cell--non-numeric">Video</th>
                    <th class="mdl-data-table__cell--non-numeric">Link</th>              
                </tr>
            </thead>
            <tbody>

<?php
//Tabla de canales, obten el numero de resultados a mostrar en $numRESULT  
            for ($i=0; $i < $numRESULT; $i++) {
              //Variables
              $usuario = "JHORJE18";
              $suscripciones = 18;
              $subs = 10;
              $subsYT = 210;
              $ya = true;
              $video = "https://www.youtube.com/watch?v=2wWC3m9i0wY";
              $link = "https://www.youtube.com/channel/UC57XOrOWOWW4XN-W22s5UrQ";

              //Cada vuelta pon la fila
              ?>
<tr>
    <td class="mdl-data-table__cell--non-numeric">
        <a href="perfil.php?user=<?php echo $usuario ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><?php echo $usuario ?></div></a>
    </td>    
    <td><?php echo $suscripciones ?></td>
    <td><?php echo $subs ?></td>
    <td><?php echo $subsYT ?></td>
    <td class="mdl-data-table__cell--non-numeric">
        <a href="<?php echo $video ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Video</div></a>
    </td>
    <td class="mdl-data-table__cell--non-numeric">
        <?php
        //Variable $ya, sera true si esta suscrito / false si no lo esta
            if ($ya){
                echo '<a href="'.$link.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">check</i> Suscrito</div></a>';
            }   else  {
                echo '<a href="'.$link.'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Suscribirse</div></a>';
            }
        ?>
    </td>                
</tr>

    <?php
            }
    //Termina de poner todas las filas y finaliza la tabla

?>
    </tbody>
</table>
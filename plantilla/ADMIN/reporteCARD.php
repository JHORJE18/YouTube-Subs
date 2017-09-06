    <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                        <a target="_blank" href="perfil.php?user=<?php echo $card[1] ?>"><div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"><?php echo $card[1] ?></div></a>
                        <span style="float:right">
                        <a href="perfil.php?user=<?php echo $card[2] ?>"><div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><?php echo $card[2] ?></div></a>
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised"><?php echo $card[3] ?></button></span>
            </div>

            <div class="mdl-cell mdl-cell--10-col">
                <p><?php echo $card[4] ?></p>
            </div>

            <div class="mdl-cell mdl-cell--2-col">
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green" style="color:white"><i class="material-icons">thumb_up</i> +<?php echo $card[5] ?></button>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--red" style="color:white"><i class="material-icons">thumb_down</i> +<?php echo $card[6] ?></button>
            </div>
        </div>
    </div>
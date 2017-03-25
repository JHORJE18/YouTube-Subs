<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

  $seccion = "Ayuda";

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
            Ayuda
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
        <div class="mld-grid mdl-cell mdl-cell--12-col">
            <h1>Zona de ayuda</h1>
            <hr>
        </div>

        <div class="mld-grid mdl-cell mdl-cell--12-col">
            <span>Comprueba que tus enlaces funcionaran en la plataforma aqui</span>
            <div class="mdl-cell mdl-cell--12-col">
                   <form action="ayuda.php" method="post" class="comprobar">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
                        <input name="canal" class="mdl-textfield__input" type="text" id="canal" value="Ha">
                        <label class="mdl-textfield__label" for="canal">Link al canal</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
                        <input name="video" class="mdl-textfield__input" type="text" id="video">
                        <label class="mdl-textfield__label" for="video">Link a un vídeo</label>
                      </div>
                    <div><input type="submit" name="comprobar" value="Comprobar enlaces" class="mdl-button mdl-js-button mdl-button--colored"></div>
                  </form>
                </div>
        </div>

        <div class"mld-grid mdl-cell mdl-cell--12-col mdl-shadow--4dp" style="padding: 1%">
        <hr>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">check</i>Web</button>
        &nbsp;
        <?php
                //Obten ultima clave para API Google
                $apiG = "SELECT * FROM `GoogleAPI` ORDER BY `GoogleAPI`.`ID` DESC";
                    if ($resultado_API = $conexion -> query($apiG)){
                        $obj = $resultado_API->fetch_array();          //Mete los valores en el array $fila[]
                        $llave = $obj[1];
                    }

            //API que debe funcionar 100%
            $apiJH = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id=UC57XOrOWOWW4XN-W22s5UrQ&key='.$llave.'');
            $resultadoAPI = json_decode($apiJH, true);
            $imagen = ($resultadoAPI['items'][0]['snippet']['thumbnails']["high"]['url']);

            //Si no obtiene imagen es que no funciona el enlace
            if ($imagen != null){
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">check</i>API de Google</button>';
            }   else {
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">close</i>API de Google</button>';
            }
            echo '&nbsp;';

            //Obten el numero de enlaces a canales que estan mal
                $buscaMAL = '%&%';
                $canalesMALOS = "SELECT * FROM `usuarios` WHERE LINK LIKE '$buscaMAL'";
                    if ($resultado = $conexion -> query($canalesMALOS)){
                        $linkCanales = $resultado -> num_rows;          //Mete los valores en el array $fila[]
                    }

            //Si no obtiene resultados es que no hay enalces de canales mal
            if ($linkCanales == 0){
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">check</i>Enlaces de canales</button>';
            }   else {
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">close</i>'.$linkCanales.' Enlaces de canales</button>';
            }
            echo '&nbsp;';

            //Obten el numero de enlaces a videos que estan mal
                $buscaMAL = '%&%';
                $videosMALOS = "SELECT * FROM `usuarios` WHERE VIDEO LIKE '$buscaMAL'";
                    if ($resultado = $conexion -> query($videosMALOS)){
                        $linkVideos = $resultado -> num_rows;          //Mete los valores en el array $fila[]
                    }

            //Si no obtiene resultados es que no hay enalces de canales mal
            if ($linkVideos == 0){
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">check</i>Enlaces a vídeos</button>';
            }   else {
                echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">close</i>'.$linkVideos.' Enlaces a vídeos</button>';
            }
            echo '&nbsp;';
                    ?>
            </div>

    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Ayuda
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

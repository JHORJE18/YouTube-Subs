<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

  $seccion = "Contacto";

      include './plantilla/cabezera.php';


      //Contacto a traves del MAIL
      if (isset($_REQUEST['email']))  {
        
        //Email information
        $admin_email = "wiijlg@hotmail.com";
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $separa = "\n-------------------------\n";
        $comment = "----SOPORTE YT SUBS----".$separa.$_REQUEST['comment'].$separa;

        $comment += "Enviado por: ".$email;
        $comment += "\nFecha y hora: ".date("Y-m-d/H:i:s");
        
        //Enviar correo
        mail($admin_email, "$subject", $comment, "From:" . $email);
        
        //Mensaje
        $mensaje = "Gracias por enviar el mensaje!";
      }

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
            Contactar
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
    <div class="mld-grid mdl-cell mdl-cell--12-col">
        <h1>Contacta con el soporte</h1>
        <hr>
        <div id="p" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width:100%"></div>
            <br>
                <center>
                    <a href="mailto:wiijlg@hotmail.com"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">email</i>Correo Electronico</div></a>
                    <a href="http://www.forocoches.com/foro/showthread.php?t=5508434&highlight="><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">forum</i>Foro</div></a>
                </center>
            <br>
        <div id="p" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width:100%"></div>

          <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-color--white">
                  <h1>Envia un mensaje</h1>
                  <hr>
                    <form action="contacto.php" method="post" class="mensaje">
                        <div class="mdl-textfield mdl-js-textfield">
                          <input name="email" class="mdl-textfield__input" type="text" id="email">
                          <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                          <input name="subject" class="mdl-textfield__input" type="subject" id="subject">
                          <label class="mdl-textfield__label" for="subject">Asunto</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield">
                          <textarea name="comment" class="mdl-textfield__input" type="text" rows= "5" id="comment" ></textarea>
                          <label class="mdl-textfield__label" for="comment">Mensaje</label>
                        </div>
                      <div><input type="submit" name="submit" value="Enviar" class="mdl-button mdl-js-button mdl-button--colored"></div>
                      <br>
                    </form>
                  </div>
          </div>

        <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--accent"><center>
            Fundador
          </center></div>
        <?php
          //Principio de la tabla
              include './plantilla/tabla/cabezera.php';

         //Sentencia SQL
         $jefe = "JHORJE18";
              $consulta = "SELECT * FROM usuarios WHERE USUARIO='$jefe'";
              if ($resultado = $conexion -> query($consulta)){
                    $obj = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                      //Obtiene los datos
                      $sesion = $_SESSION['usuario'];
                      $usuario = $obj[1];
                      $link = $obj[4];
                      $subs = $obj[9];
                      $video = $obj[6];

                      include './plantilla/tabla/fila.php';
              }
              //Fin de la tabla
              include './plantilla/tabla/fin.php';

              //Obten ultima clave para API Google
    $apiG = "SELECT * FROM `GoogleAPI` ORDER BY `GoogleAPI`.`ID` DESC";
        if ($resultado_API = $conexion -> query($apiG)){
            $obj = $resultado_API->fetch_array();          //Mete los valores en el array $fila[]
            $llave = $obj[1];
        }

$api = ('https://www.googleapis.com/youtube/v3/channels?part=snippet&id='.$canalID.'&key='.$llave.'');
echo $api;
          ?>


    </div>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Contactar
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>

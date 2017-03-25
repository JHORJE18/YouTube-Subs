<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';
  include 'seguridad.php';

  $seccion = "Reportar";

      include './plantilla/cabezera.php';

      //Obten perfil que ya quiere reportar
      if ($_GET['perfil'] != null){
        $usuarioREP = $_GET['perfil'];
      }


      //Contacto a traves del MAIL
      if (isset($_REQUEST['email']))  {
        
        //Email information
        $admin_email = "wiijlg@hotmail.com";
        $email = $_REQUEST['email'];
        $subject = "Soporte YT Subs | Reporte!";
        $separa = "\n-------------------------\n";
        $texto = "El usuario ".$_SESSION['usuario']." ha reportado al usuario ".$_REQUEST['usuario']."\nMotivos: \n";
        $comment = "[REPORTES YT SUBS]".$separa.$texto.$_REQUEST['comment'].$separa."Enviado por: ".$email;
        $textoCP = "Has reportado al usuario: ".$_REQUEST['usuario']."\npor los siguientes motivos:\n";
        $commentCP = "[REPORTES YT SUBS]".$separa.$textoCP.$_REQUEST['comment'].$separa."Revisaremos cuanto antes el reporte y tomaremos las medidas adecuadas";
                
        //Enviar correo
        mail($admin_email, "$subject", $comment, "From:" . $email);
        //Correo de copia
        mail($email, "$subject", $commentCP, "From:" . $admin_email);
        
        //Mensaje
        $mensaje = "Has reportado al usuario ".$_REQUEST['usuario'];
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
            Reportar
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">

          <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-color--white">
                  <h1><i class="material-icons" style="font-size: 50px; color: red">report</i>Reportar un usuario<i class="material-icons" style="font-size: 50px; color: red">report</i></h1>
                  <hr>
                  <?php 
                    if ($mensaje != null){
                        echo '<span>'.$mensaje.'</span><hr>';
                    }
                  ?>
                    <form action="reportes.php" method="post" class="mensaje">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input name="email" class="mdl-textfield__input" type="text" id="email">
                          <label class="mdl-textfield__label" for="email">Tu Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input name="usuario" class="mdl-textfield__input" type="text" id="usuario" value="<?php echo $usuarioREP ?>">
                          <label class="mdl-textfield__label" for="usuario">Usuario que quieres reportar</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <textarea name="comment" class="mdl-textfield__input" type="text" rows= "5" id="comment" ></textarea>
                          <label class="mdl-textfield__label" for="comment">Motivo por el que lo reportas</label>
                        </div>
                      <div><input type="submit" name="submit" value="Enviar" class="mdl-button mdl-js-button mdl-button--colored"></div>
                      <br>
                    </form>
                  </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Reportar
          </center></div>

          </div>
      </main>
    </div>
  </body>
</html>

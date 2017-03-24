<?
  session_start();
?>

<?php include("conexion.php");
?>

<?php
//Confirmamos que queremos registrar y procedemos a registrar
if(isset($_POST["iniciar"])){

    if(!empty($_POST['usuario']) && !empty($_POST['password'])) {
    //Obten datos introducidos
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    //CONSULTA USUARIO
    $consultaUSUARIO = "SELECT * FROM usuarios WHERE USUARIO='$usuario'";
        if ($resultado = $conexion -> query($consultaUSUARIO)){
        //Determinamos numero tablas
         $usuarioN = $resultado -> num_rows;
        }

        if ($usuarioN > 0){     //Existe usuario
            //CONSULTA CONTRASEÑA
            $consultaCONTRASENA = "SELECT * FROM usuarios WHERE USUARIO='$usuario' AND CONTRASENA='$password'";
                if ($resultado = $conexion -> query($consultaCONTRASENA)){
                //Determinamos numero tablas
                 $passwordN = $resultado -> num_rows;
                }
            if ($passwordN > 0){
                session_start();
                        $_SESSION['usuario']=$usuario;
                        header("Location: index.php");
            }   else    {
                $mensaje = "La contraseña introducida es incorrecta";
            }
        }   else    {           //No existe usuario
            $mensaje = "El usuario introducido no existe, registrate";
        }

    }   else    {
        $mensaje = "Todos los campos son obligatorios";
    }
}

//Confirmamos que quiere recuperar sus datos
if (isset($_POST['recuperar'])){
    if (isset($_POST['usuario'])){
        //Ha puesto algo en el campo Usuario
        $user = $_POST['usuario'];
        $division = explode("@", $user);

        if ($division[1] != null){
            //Correo valido macho
            $valeCORREO = "SELECT * FROM usuarios WHERE CORREO LIKE '$user'";
              if ($resultado = $conexion -> query($valeCORREO)){
                    $datos = $resultado->fetch_array();          //Mete los valores en el array $fila[]
              }

            //Email information
                $email = $user;
                $admin_email = "wiijlg@hotmail.com";
                $subject = "Soporte YT Subs | Datos de su cuenta";
                $separa = "\n--------------------------------------------------\n";
                $info = "Has solicitado recuperar tus datos, aqui te los dejo\nUsuario: ".$datos[1]."\nCorreo: ".$datos[2]."\nContraseña: ".$datos[3];

                $comment = $separa.$info.$separa;
                        
                //Enviar correo
                mail($email, "$subject", $comment, "From:" . $admin_email);


        }   else  {
            $mensaje = "Ponga su <strong>correo</strong> en el campo Usuario";
        }
    }   else {
        //No ha puesto nada en usuario
        $mensaje = "Ponga su <strong>correo</strong> en el campo Usuario";
    }
}

//Confirmamos que queremos registrar y procedemos a registrar
if(isset($_POST["registrar"])){

  //Si la contraseña y la confirmar contraseña coinciden continua
  if (($_POST['password']) == ($_POST['passwordC'])) {

    if(!empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['link']) && !empty($_POST['video']) && !empty($_POST['password']) ) {
        //Procesar valores
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $link = $_POST['link'];
        $video = $_POST['video'];
        $contrasena = $_POST['password'];
        $fecha = date("Y-m-d");

        //Obtiene imagen
        //Sacamos canal ID
        $division = explode("/", $link);
        $canalID = $division[4];

        $apiG = "SELECT * FROM `GoogleAPI` ORDER BY `GoogleAPI`.`ID` DESC";
        if ($resultado_API = $conexion -> query($apiG)){
            $obj = $resultado_API->fetch_array();          //Mete los valores en el array $fila[]
            $llave = $obj[1];
        }

$api = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id='.$canalID.'&key='.$llave.'');
$resultado = json_decode($api, true);
$imagen = ($resultado['items'][0]['snippet']['thumbnails']["high"]['url']);
if ($imagen == null){
    $mensaje = "El link del canal no es valido";
}   else {
    
        //Convertir valores
        $correo = strtolower ( $correo ); //AUTOMATICAMENTE MINUSCULAS

            //Datos que enviara a la BBDD
           $sql = "INSERT INTO usuarios (USUARIO, CORREO, CONTRASENA, LINK, FOTO, VIDEO, FECHA)  VALUES('$usuario', '$correo', '$contrasena', '$link', '$imagen', '$video', '$fecha')";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);


        if($result){
         $mensaje = "Cuenta Correctamente Creada";

                 //Email information
                $email = $correo;
                $admin_email = "wiijlg@hotmail.com";
                $subject = "Soporte YT Subs | Registrado";
                $separa = "\n--------------------------------------------------\n";
                $datos = "Ya estas registrado!\nUsuario: ".$usuario."\nCorreo: ".$correo."\nContraseña: ".$contrasena;

                $comment = $separa.$datos.$separa;
                        
                //Enviar correo
                mail($email, "$subject", $comment, "From:" . $admin_email);


        } else {    //No se puede insertar
         //Es por el USUARIO??
                $consultaUSUARIO = "SELECT USUARIO FROM usuarios WHERE USUARIO='$usuario'";
                if ($resultado = $conexion -> query($consultaUSUARIO)){
                    //Determinamos numero tablas
                     $consultaUsuarios = $resultado -> num_rows;
                }
            if ($consultaUsuarios != 0){
                $mensaje = "El usuario ya esta registrado";
                }   else    {
                //Es por el Correo??
                $consultaCORREO = "SELECT CORREO FROM usuarios WHERE CORREO='$email'";
                if ($resultado = $conexion -> query($consultaCORREO)){
                    //Determinamos numero tablas
                     $consultaCorreos = $resultado -> num_rows;
                }
                if ($consultaCorreos != 0){
                    $mensaje = "El correo ya ha sido registrado";
                }   else    {
                    $mensaje = "Error desconocido ".$sql ;
                }
            }
        }
    }    
        } else {
             $mensaje = "Todos los campos no deben de estar vacios!";
        }
      } else {
        $mensaje = "La contraseña para registrarse no coincide";
      }
    }
?>

    <div class="mdl-grid">

       <?php if ($mensaje) {
          echo ('<div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--accent"><center>');
          echo $mensaje;
          echo ('</center></div>');
        }   
        ?>

      <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <h1>Iniciar Sesión</h1>
                <hr>
                   <form action="usuarios.php" method="post" class="iniciar">
                      <div class="mdl-textfield mdl-js-textfield">
                        <input name="usuario" class="mdl-textfield__input" type="text" id="usuario">
                        <label class="mdl-textfield__label" for="usuario">Usuario</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield">
                        <input name="password" class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña</label>
                      </div>
                    <div><input type="submit" name="iniciar" value="Iniciar Sesion" class="mdl-button mdl-js-button mdl-button--colored"></div>
                    <div><input type="submit" name="recuperar" value="Recuperar datos" class="mdl-button mdl-js-button mdl-button--colored"></div>
                  </form>
                </div>
        </div>
      </div>

      <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
              <h1>Crear una cuenta</h1>
                <hr>
              <form action="usuarios.php" method="post" class="registro">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="usuario" class="mdl-textfield__input" type="text" id="usuario">
                    <label class="mdl-textfield__label" for="usuario">Usuario</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input name="email" class="mdl-textfield__input" type="email" id="email">
                      <label class="mdl-textfield__label" for="password">Correo electronico</label>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="link" class="mdl-textfield__input" type="text" id="link">
                    <label class="mdl-textfield__label" for="link">Link al canal</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="video" class="mdl-textfield__input" type="text" id="video">
                    <label class="mdl-textfield__label" for="video">Un video del canal</label>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input name="password" class="mdl-textfield__input" type="password" id="password">
                      <label class="mdl-textfield__label" for="password">Nueva contraseña</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input name="passwordC" class="mdl-textfield__input" type="password" id="passwordC">
                      <label class="mdl-textfield__label" for="repasswordC">Confirma la contraseña</label>
                </div>

                  <div><input type="submit" name="registrar" value="Registrarse" id="registrar" class="mdl-button mdl-js-button mdl-button--colored"></div><br>
              </form>
            </div>
          </div>
      </div>

    </div>

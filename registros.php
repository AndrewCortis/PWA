<?php
error_reporting(0);
include 'include/conecta.php';
// consulta para extraer datos de carrera
$carreras = "SELECT * FROM carreras ORDER BY Id_Carrera";
$resultado = $mysqli->query($carreras);
// integracion de API de google reCAPTCHA

$salida = "";
if (isset($_POST) && isset($_POST['sumbit'])) {
  $secretKey = '6LeiveYUAAAAAD2caWld5brMReF6tbn0Qh0A0HiI';
  $token     = $_POST['g-token'];
  $ip        = $SERVER['REMOTE_ADDR'];
  $url       = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$token."&remoteip".$ip;
  $request = file_get_contents($url);
  $response = json_decode($request);
  if ($response->succes) {
    // validar el password
    $pwd = $_POST['Password'];
    $cpwd = $_POST['CPassword'];
      if ($pwd == $cpwd) {
        $Nombre = $mysqli->real_escape_string($_POST['Nombre']);
        $Apellido1 = $mysqli->real_escape_string($_POST['ApellidoP']);
        $Apeliido2 = $mysqli->real_escape_string($_POST['ApellidoM']);
        $Email = $mysqli->real_escape_string($_POST['Email']);
        $Carrera = $mysqli->real_escape_string($_POST['Carrera']);
        $Matricula = $mysqli->real_escape_string($_POST['Matricula']);
        $Telefono = $mysqli->real_escape_string($_POST['Telefono']);
        $TUsuario = 1;
        $NUsuario = $mysqli->real_escape_string($_POST['Usuario']);
        $pass = md5($_POST['Password']);
        $img = "user.png";
        //consulta para insertar los datos dentro de la BD
        $inserta = "INSERT INTO Usuarios (Nombre, ApellidoP, ApellidoM, Email, Id_Carrera, Matricula, Telefono, TUsuario, NUsuario, Password) VALUES('$Nombre','$Apellido1','$Apeliido2','$Carrera','$Matricula','$Telefono','$TUsuario','$NUsuario','$pass','$img')";
        $registro = $mysqli->query($inserta);
      }
      else {
        $salida.="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>Tus contraseñan no coinciden</strong> Por Fvaor Verifica tu Password
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
      }
  }
  else {
    $salida.="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>Tus contraseñan no coinciden</strong> Por Fvaor Verifica tu Password
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
  }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Registros</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeiveYUAAAAAARt1WBq_tHgUELuMIIedpm1LnDf"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark lighten-1 navbar-static-top">
      <a class="navbar-brand" href="#">AleLugo</a>
        <button class="navbar-toggler" type="button" data-loggie="collapse" data-larget="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-laber="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><span class="icon-heart-empty">Dashboard</span></a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span class="icon-lock-open">Inicio de Sesión</span></a>
            </li>
            <li class="nav-link" href="#"><span class="icon-facebook"></span></li>
            <li class="nav-link" href="#"><span class="icon-twitter"></span></li>
            <li class="nav-link" href="#"><span class="icon-instagram"></span></li>
          </ul>
        </div>
    </nav>

    <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
              <div class="card rounded-2 rounded" id="login-form">
                <div class="card-header">
                  <h3 class="mb-8 text-center">Registro Nuevo Usuario</h3>
                </div>
                <div class="card-body">
                  <form class="form" name="Fregistro" action="<?php echo $_SERVER['PHP_SELF']; ?> " id="formlogin" method="POST" autocomplete="off">
                      <input type="hidden" name="g-token" id="g-token">
                      <div class="form-group">
                        <input type="text" name="Nombre" id="Nombre" class="form-control formlogin" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="ApellidoP" id="ApellidoP" class="form-control formlogin" placeholder="ApellidoP" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="ApellidoM" id="ApellidoM" class="form-control formlogin" placeholder="ApellidoM" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="Email" id="Email" class="form-control formlogin" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control formlogin" name="Carrera" id="Carrera" required>
                          <option value="">Selecciona tu carrera</option>
                          <?php while($row = $resultado->fetch_assoc()) { ?>
                          <option value="<?php echo $row['Id_Carrera']; ?>"><?php echo $row['Nombre']; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" name="Matricula" id="Matricula" class="form-control formlogin" placeholder="Matricula" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="Telefono" id="Telefono" class="form-control formlogin" placeholder="Telefono" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="Usuario" id="Usuario" class="form-control formlogin" placeholder="Nombre de Usuario" required>
                      </div>
                      <div class="form-group">
                        <input type="password" name="Password" id="pass" class="form-control formlogin" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <input type="password" name="CPassword" id="cpass" class="form-control formlogin" placeholder="Confirmar Password" required>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" name="form-check-input" id="cpass" name="cpass" onclick="verpass(this);">
                        <label class="form-check-label" for="pass"><span class="icon-lock-open"></span>Ver Password</label>
                      </div>
                  </div>
                    <div class="card-footer">
                      <div class="custom-control custom-switch text-right">
                        <input type="checkbox" name="checkbox" class="custom-control-input" id="checkbox" onclick="habilitar();">
                        <label for="checkbox" class="custom-control-label">Acepto Términos y Condiciones</label>
                      </div>
                      <div class="col">
                        <input type="submit" name="submit" class="btn btn-success" value="Registrar" disabled="disabled">
                        <input type="reset" name="borrar" class="btn btn-danger" value="Cancelar">
                      </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
    grecaptcha.ready(function() {
    grecaptcha.execute('6LeiveYUAAAAAARt1WBq_tHgUELuMIIedpm1LnDf', {action: 'homepage'}).then(function(token) {
    document.getElementByid("g-token").value = token;
    });
  });
</script>
    <script>
        function verpass(cb){
          if (cb.checked)
          $('#cpass').attr("type","text");
          else
          $('#cpass').attr("type","password");
        }
        function habilitar(){
          document.Fregistro.submit.disabled = !document.Fregistro.checkbox.checked;
        }
    </script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
</html>

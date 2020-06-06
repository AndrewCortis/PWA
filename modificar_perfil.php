<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    //consulta para extraer datos de la bd
    $q= "SELECT * FROM usuarios WHERE NUsuario = '".$usuario."'";
    $consulta = $mysqli->query($q);
    $perfil = $consulta->fetch_array();
    if ($perfil = 0) {
      $user = $perfil;
    }
    //extraer los datos del perfil a mostrar
    $id = $_GET['Id_Usuario'];
    $m = "SELECT * FROM usuarios WHERE Id_Usuario = '".$id."'";
    $modificar = $mysqli->query($m);
    $row = $modificar->fetch_array(MYSQLI_ASSOC);
    //consulta para modificar perfil en la BD
    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $nombre = $mysqli->real_escape_string($_POST['nombre']);
      $apellido1 = $mysqli->real_escape_string($_POST['ApellidoP']);
      $apellido2 = $mysqli->real_escape_string($_POST['ApellidoM']);
      $email = $mysqli->real_escape_string($_POST['email']);
      $carrera = $mysqli->real_escape_string($_POST['carrera']);
      $matricula = $mysqli->real_escape_string($_POST['matricula']);
      $telefono = $mysqli->real_escape_string($_POST['telefono']);
      $nuser = $mysqli->real_escape_string($_POST['nuser']);
      $pass =md5($_POST['pass']);
      $sql = "UPDATE usuarios SET Nombre = '$nombre', ApellidoP = '$apellido1', ApellidoM = '$apellido2', Email = '$email', Id_Carrera = '$carrera', Matricula = '$matricula', Telefono = '$telefono', NUsuario = '$nuser', Password = '$pass' WHERE Id_Usuario = '$id' ";
      $resultado = $mysqli->query($sql);
        header("location:perfil.php");
    }

    $mysqli->close();
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Barra de Navegacion</title>
  </head>
</script>
  <body>
  <?php include 'include/navbar.php'; ?>
    <!-- Termina contenido de barra de Navegacion -->
    <!-- Inicio de ventana modal -->
  <?php include 'include/modal.php'; ?>
    <!-- Fin de ventana modal -->
    <!-- inicia mi formulario de modificar-->
    <div class="container py-5">
      <div class="row">
        <div class="card">
          <div class="card-header">
            Modificar Datos de Usuario
          </div>
          <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              <div class="form-row">
                <input type="hidden" name="id" id="id" value="<?php echo $row ['Id_Usuario'] ?>">
                <div class="form-group col-md-4">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $row ['Nombre'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="ApellidoP">Apellído Paterno</label>
                  <input type="text" name="ApellidoP" class="form-control" value="<?php echo $row ['ApellidoP'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="ApellidoM">Apellído Materno</label>
                  <input type="text" name="ApellidoM" class="form-control" value="<?php echo $row ['ApellidoM'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Email">Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $row ['Email'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Telefono">Teléfono</label>
                  <input type="text" name="telefono" class="form-control" value="<?php echo $row ['Telefono'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="User">Nombre de Usuario</label>
                  <input type="text" name="nuser" class="form-control" value="<?php echo $row ['NUsuario'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Matricula">Matricula</label>
                  <input type="text" name="matricula" class="form-control" value="<?php echo $row ['Matricula'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Carrera">Carrera</label>
                  <input type="text" name="carrera" class="form-control" value="<?php echo $row ['Id_Carrera'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Pass">Contraseña</label>
                  <input type="password" name="pass" class="form-control" value="<?php echo $row ['Password'] ?>">
                </div>
                <input type="submit" name="submit" value="Modificar" class="btn btn-success btn-lg btn-block">
              </div>
            </form>
          </div>
          <div class="card-footer">Usuario: <?php echo $row['Id_Usuario']; ?></div>
        </div>
      </div>

    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
  </html>

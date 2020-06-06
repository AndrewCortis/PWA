<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    //consulta para extraer datos del perfil
    $q = "SELECT * FROM usuarios WHERE NUsuario = '".$usuario."'";
    $consulta = $mysqli->query($q);
    $perfil = $consulta->fetch_array();
    if ($perfil > 0) {
      $user = $perfil;
    }
    $mysqli->close();
    //termina la consulta para la extraccion de datos del perfil
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Perfil</title>
  </head>
  <body>
    <?php include 'include/navbar.php'; ?>
      <!-- Termina contenido de barra de Navegacion -->
      <!-- Inicio de ventana modal -->
    <?php include 'include/modal.php'; ?>
      <!-- Fin de ventana modal -->
    <!-- inicia apartado de informacion-->
    <div class="container py-5">
      <div class="row">
        <div class="col col-lg-6 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              Información de Perfil
            </div>
            <div class="card-body">
              <h5 class="card-tittle text-center">Nombre Completo: <?php echo $user['Nombre'];?> <?php echo $user['ApellidoP'];?> <?php echo $user['ApellidoM'];?></h5>
              <p class="card-text text-center">Email: <?php echo $user['Email'];?></p>
              <p class="card-text text-center">teléfono: <?php echo $user['Telefono'];?></p>
              <p class="card-text text-center">Carrera: <?php echo $user['Id_Carrera'];?></p>
              <p class="card-text text-center">Matrícula: <?php echo $user['Matricula'];?></p>
              <p class="card-text text-center">Usuario: <?php echo $user['NUsuario'];?></p>
            </div>
            <div class="card-footer text-muted">Esta es tu información personal</div>
          </div>
        </div>
        <div class="col col-lg-6 col-md-12 col-sm-12">
          <div class="col-md-6 mx-auto d-block" id="perfil">
            <img src="img/<?php echo $user['Imagen'];?>" alt="Imagen de perfil" class="rounded-circle">
          </div>
          <div class="m5 text-center">
            <a href="modificar_perfil.php?Id_Usuario=<?php echo $user['Id_Usuario'] ?>" class="btn btn-success">Modificar</a>
            <a href="historial.php?Id_Usuario=<?php echo $user['Id_Usuario'] ?>" class="btn btn-info">Historial</a>
            <a href="#" class="btn btn-danger">Hacer una impresion</a>
          </div>
        </div>
      </div>
    </div>
    <!-- termina apartado de informacion-->

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
</html>

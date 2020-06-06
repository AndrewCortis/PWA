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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark lighten-1 navbar-static-top">
      <a class="navbar-brand" href="#"><?php echo $_SESSION{'usuario'}; ?></a>
        <button class="navbar-toggler" type="button" data-loggie="collapse" data-larget="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-taber="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="catalogo.php">Inicio</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Tengo algo para ti</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Equipamientos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle "href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cosas interesante</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">GLOCK`S</a>
                <a class="dropdown-item" href="#">¡OFERTAS!</a>
                <a class="dropdown-item" href="#">LANZAMINETOS</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="buscar_producto.php">¿QUIERES MÁS?</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icon">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle "href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-upload-cloud"><?php echo $_SESSION{'usuario'}; ?></span></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="perfil.php">Perfil</a>
                <a class="dropdown-item" href="#">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCenter">Cerrar Sesión</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="carrito.php">Compras <?php echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']); ?> </a>
            </li>
            <li>
              <a class="nav-link" href="#">Versión 1.0</a>
            </li>
          </ul>
          <li class="nav-link" type="button" href="#"><span class="icon-facebook"></span></li>
          <li class="nav-link" type="button" href="#"><span class="icon-twitter"></span></li>
          <li class="nav-link" type="button" href="#"><span class="icon-instagram"></span></li>

        </div>
    </nav>
    <!-- Termina contenido de barra de Navegacion -->

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
  </html>

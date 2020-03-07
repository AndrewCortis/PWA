<?php
  include "include/conecta.php";
  // consulta que se utiliza para extraer datos de mi BD
  $query = "SELECT * FROM Productos ORDER BY Id_productos";
  $ejecuta = $mysql->query($query);
  $numero = $ejecuta->num_rows;
  $mysql->close();
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
  <script type="text/javascript" src="">
	$(document) ready(function(){
		alert("Hola que hace")
	})
</script>
  <body
  <!-- inicia contenido de barra de Navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark lighten-1">
      <a class="navbar-brand" href="#">Eminem <span class="icon-menu"></span></a>
        <button class="navbar-toggler" type="button" data-loggie="collapse" data-larget="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-taber="Toggle navigation"
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio <span class="icon-heart-empty"></span></a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Tengo algo para ti <span class="icon-upload-cloud"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Una pequeña historia <span class="icon-spin4"></span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle "href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cosas interesante</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Mensajes de tu ex <span class="icon-mic"></span></a>
                <a class="dropdown-item" href="#">Trabajos con salario de mas de $10000 pesos <span class="icon-share"></span></a>
                <a class="dropdown-item" href="#">Que tus padres estén orgullosos de ti <span class="icon-mute"></span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Vuelve después</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icon">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle "href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-upload-cloud"></span>Usuario</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCenter">Cerrar Sesión</a>
              </div>
            </li>
          </ul>

        </div>
    </nav>
    <!-- Termina contenido de barra de Navegacion -->
    <!-- Inicio de ventana modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalCenterTitle">Cerrar Sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-tabel="Close"><span aria-hidden="true">&times;</span></button>
          </div>
            <div class="modal-body">¿Deseas cerrar tu sesión?</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger">Cerrar Sesión</button>
            </div>
        </div>
      </div>
    </div>
    <!-- Fin de ventana modal -->
    <div class="alert alert-primary" role="alert">
    Great! Your connection is successfully.
    </div>
    <section>
      <!-- Inicio de cards -->
      <div class="container">
        <div class="row">
          <?php while($row = $ejecuta->fetch_array()) { ?>
          <div class="col-sm">
            <div class="card mb-3" style="max-widht: 580px">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="img/img1.jpg" class="card-img" alt="Producto01">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Nombre del producto</h5>
                    <p class="card-text">Descripcion:</p>
                    <p class="card-text"><small class="text-muted">Precio:</small></p>
                    <button type="button" name="btn-compra" class="btn btn-danger nav-link">Agregar al carrito</button>
                  </div>
                </div>
              </div>
              <div class="card-rooter text-muted">
                Categoria:
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card mb-3" style="max-widht: 580px">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="img/<?php echo $row("Imagen");?>" class="card-img" alt="Producto01">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row("Nombre");?></h5>
                    <p class="card-text">Descripcion:<?php echo $row("Descripcion");?></p>
                    <p class="card-text"><small class="text-muted">Precio:<?php echo $row("Precio");?></small></p>
                    <button type="button" name="btn-compra" class="btn btn-danger nav-link">Agregar al carrito</button>
                  </div>
                </div>
              </div>
              <div class="card-rooter text-muted">
                Categoria:<?php echo $row("Id_categoria");?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card mb-3" style="max-widht: 580px">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="img/img3.jpg" class="card-img" alt="Producto01">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Nombre del producto</h5>
                    <p class="card-text">Descripcion:</p>
                    <p class="card-text"><small class="text-muted">Precio:</small></p>
                    <button type="button" name="btn-compra" class="btn btn-danger nav-link">Agregar al carrito</button>
                  </div>
                </div>
              </div>
              <div class="card-rooter text-muted">
                Categoria:
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- Termino de cards -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
</html>

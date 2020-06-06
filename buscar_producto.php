<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    //generear consluta para la busqueda de los Productos
    $where = "";
    if (!empty($_POST)) {
      $valor = $_POST['valor'];
      if (!empty($valor)) {
        $where = "WHERE Nombre LIKE '%$valor%'";
      }
    }
    //consulta para extraer datos
    $query = "SELECT * FROM Productos $where ORDER BY Nombre";
    $resultado = $mysqli->query($query);
    $numero = $resultado->num_rows;
    $mysqli->close();

    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/tamaños.css">
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
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>¡Excelente!</strong> Tu conexión fue correcta
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-body col-lg-12 col-md-12 col-ms-12">
          <div class="col-md-12">
            <p>Buscar producto</p>
              <!-- formulario para busqueda-->
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-row">
                  <div>
                    <input type="text" name="valor" id="valor" placeholder="Nombre del Producto">
                    <input type="submit" name="buscar" value="Buscar" class="btn btn-success">
                  </div>
                </div>
              </form>
              <!--termina el formulario-->

          </div>
        </div>
      </div>
    </div><br>
    <div class="container container-fluid">
      <div class="card">
        <div class="card-body">
          <!-- comienza tabla de productos-->
          <table class="table table-striped table-hover border border-black">
            <thead>
              <tr class="thead-dark">
                <th scope="col">Nombre del Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Agregar</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $resultado->fetch_assoc()){?>
              <tr>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Descripcion']; ?></td>
                  <td>$ <?php echo $row['Precio']; ?> Pesos</td>
                  <td><img src="img/<?php echo $row['Imagen']; ?>" class="imgcatalogo"></td>
                  <td>
                    <form action="carrito.php" method="post" name="cantidad">
                      <input type="number" name="cantidad" placeholder="Selecciona una Cantidad">
                    </form>
                  </td>
                    <td><button name="btn_carrito" class="btn btn-success">+</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <!-- terrmina tabla de productos-->
        </div>
      </div>
    </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
      </body>
        </html>

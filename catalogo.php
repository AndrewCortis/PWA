<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
  // consulta que se utiliza para extraer datos de mi BD
  $query = "SELECT * FROM productos ORDER BY Id_Producto";
  $ejecuta = $mysqli->query($query);
  $numero = $ejecuta->num_rows;
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
  <strong>¡Felicidades!</strong> Tu conexión fue correcta
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <section>
      <!-- Inicio de cards -->
      <div class="container">
        <?php echo $accion; ?>
        <?php if ($alert!="") { ?>
          <div class="alert alert-success">
            <?php echo $alert; ?>
            <a href="carrito.php" class="badge badge-seccess">Ver Carrito de Compra</a>
          </div>
        <?php } ?>
      <div class="col-lg-12 col-md-12 col-ms-12">
        <h4>Categorias de Productos</h4>
      </div>
        <div class="row">
          <?php while($row = $ejecuta->fetch_assoc()) { ?>
            <div class="card mb-6" style="max-widht: 580px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="img/<?php echo $row["Imagen"];?>" class="card-img" alt="producto">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row["Nombre"];?></h5>
                    <p class="card-text">Descripción: <?php echo $row["Descripcion"];?></p>
                    <p class="card-text"><small class="text-muted">Precio: $<?php echo $row["Precio"];?> Pesos</small></p>
                    <!-- formulario para enviar al carrito de compra-->
                    <form class="" action="" method="post">
                      <input type="hidden" name="id" value="<?php echo openssL_encrypt($row['Id_Producto'],COD,KEY); ?>">
                      <input type="hidden" name="nombre" value="<?php echo openssL_encrypt($row['Nombre'],COD,KEY); ?>">
                      <input type="hidden" name="precio" value="<?php echo openssL_encrypt($row['Precio'],COD,KEY); ?>">
                      <input type="hidden" name="numero" value="<?php echo openssL_encrypt(1,COD,KEY) ?>">
                      <div aling="right">
                        <button type="submit" name="btn_carrito" value="Agregar" class="btn btn-success">Agregar al carrito</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-rooter text-muted">
                Categoria:<?php echo $row["Id_Categoria"];?>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section>
    <!-- Termino de cards -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
  </body>
</html>

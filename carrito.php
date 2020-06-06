<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
      <link rel="stylesheet" href="css/tamaños.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Carrito de Compra</title>
  </head>
</script>
  <body>
  <?php include 'include/navbar.php'; ?>
    <!-- Termina contenido de barra de Navegacion -->
    <!-- Inicio de ventana modal -->
  <?php include 'include/modal.php'; ?>
  <br>
  <div class="text text-center">
    <h3>Bienvenido a tu carrito de compra <?php echo $_SESSION['usuario'] ?></h3>
<?php if (!empty($_SESSION['Carrito'])) { ?>
  <table class="table table-responsive-lg table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text text-center">Descripción</th>
        <th scope="col" class="text text-center">Cantidad</th>
        <th scope="col" class="text text-center">Precio</th>
        <th scope="col" class="text text-center">Total</th>
        <th class="text text-center">Detalles</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>
      <?php foreach ($_SESSION['Carrito'] as $indice => $producto) { ?>
        <tr>
          <td><?php echo $producto['NOMBRE']; ?></td>
          <td class="text text-center"><?php echo $producto['CANTIDAD']; ?></td>
          <td class="text text-center"> $<?php echo number_format($producto['PRECIO'],2); ?></td>
          <td class="text text-center"> $<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
          <td class="text text-center">
            <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD, KEY); ?>">
              <button type="submit" class="btn btn-danger btn-sm" name="btn_carrito" value="Eliminar">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php $total = $total+($producto['PRECIO']+$producto['CANTIDAD']); ?>
      <?php  } ?>
      <tr>
        <td colspan="4" aling="right"><h3>Total</h3></td>
        <td aling="right"><h3>$ <?php echo number_format($total,2); ?></h3></td>
      </tr>
    </tbody>
  </table>
    <div class="container">
      <div class="alert alert-primary" role="alert">
        Confirmación de Compra
      </div>
      <form action="confirmar.php" method="post">
        <div class="fomr-group py-2">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email de Confirmación">
          <small class="text-muted">Por Favor Verifica tu Email</small>
          <button href="confirmar.php" type="submit" name="btn_carrito" class="btn btn btn-outline btn-success btn-lg btn-block" value="Confirmar">Confirmar</button>
        </div>
        </form>
    </div>
  <?php  } else { ?>
    <div class="alert alert-warning text-center">
        Aún no hay compras en tu carrito
    </div>
  </div>
<?php } ?>
<?php echo $accion; ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</body>
</html>

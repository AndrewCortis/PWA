<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    $historia = "SELECT * FROM ventas WHERE Usuario = '".$usuario."'";
    $ejecuta = $mysqli->query($historia);
    $líneas = $ejecuta->num_rows;
    //consulta para obtener el total de compras por usuario
    $query = "SELECT Total FROM ventas WHERE Usuario = '".$usuario."'";
    $query_run = $mysqli->query($query);
    $qty = 0;
    while ($num = $query_run->fetch_assoc()) {
      $qty += $num['Total'];
    }
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
    <title>Carrito de Compra</title>
  </head>
  <body>
    <?php include 'include/navbar.php'; ?>
      <!-- Termina contenido de barra de Navegacion -->
      <!-- Inicio de ventana modal -->
    <?php include 'include/modal.php'; ?>
      <!-- Fin de ventana modal -->
    <!-- inicia apartado de informacion-->
    <div class="container py-4">
      <h2 class="text text-center">Historial de Compras <?php echo $usuario; ?></h2>
    </div>
    <?php if ($líneas > 0) { ?>
      <div class="container">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th class="text text-center" scope="col">Fecha</th>
              <th class="text text-center" scope="col">Email</th>
              <th class="text text-center" scope="col">Total</th>
              <th class="text text-center" scope="col">Token de Venta</th>
              <th class="text text-center" scope="col">Estatus</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($historia = $ejecuta->fetch_assoc()) {
              $fechaoriginal = $historia['fecha'];
              $fechaF = date("d-m-Y", strtotime($fechaoriginal));
              ?>
              <tr>
                <td class="text text-center"><?php echo $fechaF; ?></td>
                <td class="text text-center"><?php echo $historia['Correo']; ?></td>
                <td class="text text-center"><?php echo number_format($historia['Total'],2); ?></td>
                <td class="text text-center"> <a href="qr/<?php echo $historia['Token'].'.png'; ?>" target="_blank" class="badge"></a> </td>
                <td class="text text-center"><?php echo $historia['Estatus']; ?></td>
              </tr>
            <?php } ?>
            <tr>
              <td class="text text-center" colspan="2" aling="right">Total de Compras:</td>
              <td class="text text-center"><?php echo number_format($qty,2); ?></td>
            </tr>
          </tbody>
        </table>
        <div class="card">
          <div class="card-header">
            Acciones
          </div>
          <div class="card-body">
            Ver e Imprimir Historial de Compras
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="container">
        <div class="alert alert-danger">
          <p class="text text-center">Aún no tienes ninguna compra en tu Historial</p>
        </div>
      </div>
    <?php } ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</body>
</html>

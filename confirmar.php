<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
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
    <title>Confirmación de Pago</title>
  </head>
  <body>
    <?php include 'include/navbar.php'; ?>
      <!-- Termina contenido de barra de Navegacion -->
      <!-- Inicio de ventana modal -->
    <?php include 'include/modal.php'; ?>
      <!-- Fin de ventana modal -->
    <!-- inicia apartado de informacion-->
    <?php
      if ($_POST['btn_carrito']) {
        $total = 0;
        $UserId = session_id();
        $fecha = date('Y-m-d');
        $fechaF = date('d-m-Y');
        $Correo = $_POST['email'];
        $estatus = "Pendiente";
        foreach ($_SESSION['Carrito'] as $indice=>$producto) {
          $total = $total+($producto['PRECIO']*$producto['CANTIDAD']);
        }
      }
     ?>
     <?php
     if (!empty($_SESSION['Carrito'])) { ?>
       <div class="container">
         <div class="text text-center">
           <h4>Gracias por tu compra <?php echo $usuario;?> </h4>
         </div>
         <ul class="list-group">
            <li class="list-group-item active">Datos de la compra</li>
            <li class="list-group-item">Key de Compra: <?php echo $UserId; ?> </li>
            <li class="list-group-item">Usuario: <?php echo $usuario; ?> </li>
            <li class="list-group-item">Fecha: <?php echo $fechaF; ?> </li>
            <li class="list-group-item">Email: <?php echo $Correo; ?> </li>
            <li class="list-group-item">Estatus: <?php echo $estatus; ?> </li>
            <li class="list-group-item"><?php echo "<h3> Total: ".$total." MNX </h3>"; ?> </li>
         </ul>
         <div class="row">
           <div class="col">
             <small class="text text-muted">Verifica que tus datos sean los correctos y finaliza tu compra</small>
           </div>
           <div class="col">
             <form name="compra" action="terminarpago.php" method="post">
               <input type="hidden" name="key" value="<?php echo $UserId; ?>">
               <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
               <input type="hidden" name="fecha" value="<?php echo $fechaF; ?>">
               <input type="hidden" name="correo" value="<?php echo $Correo; ?>">
               <input type="hidden" name="estatus" value="<?php echo $estatus; ?>">
               <input type="hidden" name="total" value="<?php echo $total." MNX";  ?>">
               <input type="submit" name="Ccompra" value="Terminar Compra" class="btn btn-sm btn-block btn-success">
             </form>
           </div>
         </div>
          <?php } else { ?>
          <div class="container py-3">
            <div class="alert alert-danger text-center">
              Aún no haz confirmado ninguna compra
            </div>
          </div>
       </div>

     <?php } ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</body>
</html>

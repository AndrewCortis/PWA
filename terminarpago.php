<?php //abro php
  session_start(); //se coloca una variable, se crea una sesión
  include 'include/conecta.php';
  include 'include/config.php';
  include 'include/carrito.php';
  $usuario = $_SESSION{'usuario'};
    if (!isset($usuario)) {
      header("location:index.php");
    }
    if (isset($_POST['Ccompra'])) {
      // se va a generar un token
      $caracteres = "123456789ABCDEFGHIJKLMNOPQRSTVWXYZabcdefghijklmnopqrstuvwxyz-.#!";
      for ($i=0; $i<10 ; $i++) {
        $token = substr(str_shuffle($caracteres),0,10);
      }
      // recuperar datos para la venta
      $llave = $mysqli->real_escape_string($_POST['key']);
      $fecha = $mysqli->real_escape_string($_POST['fecha']);
      $cliente = $mysqli->real_escape_string($_POST['usuario']);
      $email = $mysqli->real_escape_string($_POST['correo']);
      $total = $mysqli->real_escape_string($_POST['total']);
      $estadoC = $mysqli->real_escape_string($_POST['estatus']);
      // generar codigo qr
      require 'phpqrcode/qrlib.php';
      // declarar la carpeta dondese contendrán
      $dir = 'qr/';
      // validar si existela carpeta
      if (!file_exists($dir)) {
        mkdir($dir);
        // ruta y destino de el archivo a crear
        $filename = $dir.$token.'.png';
        //parametros de el qr
        $tamaño = 5; //tamaño de el pixel
        $level= 'M'; // Precisión del QE
        $framSize = 3; //  tamaño blanco
        $contenido = ('Llave de la compra: '.$llave.' Fecha: '.$fecha.' Cliente '.$cliente.' Email '.$email.' Total de la compra '.$total.' Estatus '.$estadoC);
        //crear el qr con imagen
        QRcode::png($contenido,$filename,$level,$tamaño,$framSize);
        // verificar que no exista una venta con el mismo token
        $Pagonuevo = "SELECT * FROM ventas WHERE Token = '$token'";
        $nuevo = $conecta->query($Pagonuevo);
        $alert.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Ya existe el registro de tu compra</strong> El token de tu compra ya existe
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";}
      else {
        $registro = "INSERT INTO ventas(ClaveVenta, Token, Fecha, Usuario, Correo, Total, Estatus)VALUES('$llave','$token','$fecha','$cliente','$email', '$total', '$estadoC')";
        $inserta = $mysqli->query($registro);
        $alert.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Tu compra fue exitosa</strong> Ya puedes descargar tu comprobante de pago.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      unset($_SESSION['Carrito']);
      }
    }
    // cierra nuestra BD
    $mysqli->close();
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Confirmación de Compra</title>
  </head>
  <body>
    <?php include 'include/navbar.php'; ?>
      <!-- Termina contenido de barra de Navegacion -->
      <!-- Inicio de ventana modal -->
    <?php include 'include/modal.php'; ?>
      <!-- Fin de ventana modal -->
    <!-- inicia apartado de informacion-->
    <div class="container py-">
      <?php echo $alert; ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <h5 class="card-header">Código QR de la compra</h5>
              <div class="card-body">
                <?php echo '<img src="'.$filename.'">';?>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h5>Datos de la Compra</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Código de Venta: </b> <?php echo $token ?></li>
                  <li class="list-group-item"><b>Fecha de Venta: </b> <?php echo $fecha ?></li>
                  <li class="list-group-item"><b>Email de Confirmación: </b> <?php echo $email ?></li>
                  <li class="list-group-item"><b>Usuario: </b> <?php echo $usuario ?></li>
                  <li class="list-group-item"><b>Monto de Compra: </b> MNX <?php echo number_format($total,2); ?></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</body>
</html>

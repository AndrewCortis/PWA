<?php
$mensaje ="Hola";
$servidor ="localhost";
$usuario ="root";
$password ="";
$bd ="web";
$mysqli = mysqli_connect($servidor,$usuario,$password,$bd);
if ($mysqli->connect_error) {
  die("Error al conectarse con la base de datos de la WebApp".$mysqli->connect_error);
}
else {
  $mensaje.="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>¡Felicidades!</strong> Tu conexión fue correcta
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";
}
?>

<?php
$mensaje ="Hola";
$servidor ="localhost";
$usuario ="root";
$password ="";
$bd ="WebApp";
$mysql = mysqli_connect($servidor,$usuario,$password,$bd);
if ($mysql->connect_error) {
  die("Error al conectarse con la base de datos de la WebApp".$mysql->connect_error);
}
else {
  $mensaje.="<div class=´alert alert-success alert-dismissible fade show´ role=´alert´>
            <strong>Great!</strong>Your connection is successfully.
            <button type=´button´ class=´close´data-dismiss=´alert´ aria-label=´Close>
            <span aria-hidden=´true´>&times;</span>
            </button>
          </div>";
}
?>

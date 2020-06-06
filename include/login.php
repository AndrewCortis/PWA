<?php
  session_start(); 
  include '../include/conecta.php';
  $usuario = $_POST['user'];
  $password = md5($_POST['password']);
//consulta que se utiliza para ingresar al sitema
  $q = "SELECT * FROM usuarios WHERE NUsuario = '$usuario' and Password = '$password'";
  if ($resultado = $mysqli->query($q)) {
    while($row = $resultado->fetch_array()){
      $userok = $row['NUsuario'];
      $passwordok = $row['Password'];
    }
    $resultado->close();
  }
  $mysqli->close();
  if (isset($usuario)&& isset($password)) {
    if ($usuario == $userok && $password == $passwordok) {
      $_SESSION['login']= TRUE;
      $_SESSION['usuario'] = $usuario;
      header("location:../catalogo.php");
    }
    else {
      header("location:../index.php");
    }
  } else {
    header("location:../index.php");
  }
?>

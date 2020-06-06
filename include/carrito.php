<?php
error_reporting(0);
session_start();
// se coloca un mensaje de alerta para el carrito de compra
$alert = "";
if (isset($_POST['btn_carrito'])) {
  switch ($_POST['btn_carrito']) {
    case 'Agregar':
      if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
        $ID = openssl_decrypt($_POST['id'],COD,KEY);
        $alert.= "Ok ID correcto".$ID;
      }
      else {
        $alert.= "Error en el ID de compra".$ID;
      }
      if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
        $nom = openssl_decrypt($_POST['nombre'],COD,KEY);
        $alert.= "El Nombre del producto es correcto".$nom;
      }
      else {
        $alert.= "Error en el Nombre del Produto".$nom; break;
      }
      if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
        $precio = openssl_decrypt($_POST['precio'],COD,KEY);
        $alert.= "El precio del producto es correcto".$precio;
      }
      else {
        $alert.= "Error en el precio del producot".$precio; break;
      }
      if (is_numeric(openssl_decrypt($_POST['numero'],COD,KEY))) {
        $cantidad = openssl_decrypt($_POST['numero'],COD,KEY);
        $alert.= "Es correcto ".$cantidad;
      }
      else {
        $alert.= "Error en la cantidad de compra".$cantidad; break;
      }
      if (!isset($_SESSION['Carrito'])) {
        $producto = array(
          'ID'=>$ID,
          'NOMBRE'=>$nom,
          'CANTIDAD'=>$cantidad,
          'PRECIO'=>$precio
        );
        $_SESSION['Carrito'][0]=$producto;
        $alert = "Producto Agregado al Carrito";
      }
      else {
        $idproductos = array_column($_SESSION['Carrito'],'ID');
        if (in_array($ID,$idproductos)) {
          $accion.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Ya seleccionaste el producto</strong> Ya se encuentra en tu carrito
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        $alert = "";
      }else {
        $Masproductos = count($_SESSION['Carrito']);
        $producto = array(
          'ID'=>$ID,
          'NOMBRE'=>$nom,
          'CANTIDAD'=>$cantidad,
          'PRECIO'=>$precio
        );
        $_SESSION['Carrito'][$Masproductos]= $producto;
        $alert = "Producto agregado al carrito";
      }
    }
    break;
    case 'Eliminar':
    if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
      $ID = openssl_decrypt($_POST['id'],COD,KEY);
      foreach ($_SESSION['Carrito'] as $indice => $producto) {
        if ($producto['ID'] == $ID) {
          unset($_SESSION['Carrito'][$indice]);
          $accion.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Se eliminó tu proucto</strong> Tu producto se ha eliminado del carrito de compra
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span> 
          </button>
        </div>";
        }
      }
    }else {
      $alert.="Error en el ID".$ID;
    }
    break;
  }
}
 ?>

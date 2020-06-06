<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <title>Barra de Navegacion</title>
  </head>
</script>
<body>
  <!-- Inicio de ventana modal -->
  <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCenterTitle">Cerrar Sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-tabel="Close"><span aria-hidden="true">&times;</span></button>
        </div>
          <div class="modal-body">¿Deseas cerrar tu sesión <?php echo $_SESSION{'usuario'}; ?>?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="include/session.php" type="button" class="btn btn-danger">Cerrar Sesión</a>
          </div>
      </div>
    </div>
  </div>
  <!-- Fin de ventana modal -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontello.css">
    <title>Login</title>
  </head>
  <body>
  <div class="container py-5">
    <div class="row">
         <div class="col-md-12">
            <div class="col-md-12 text-center mb-5">
              <img src="..." alt="">
            </div>
            <div class="row">
              <div class="col-md-6 mx-auto">
                <div class="card rounded-2 rounded" id="login-form">
                  <div class="card-header">
                    <h3 class="mb-0 text-center">Inicio de Sesión</h3>
                  </div>
                  <div class="card-body">
                    <form class="form" name="login" action="include/login.php" id="formlogin" method="POST" autocomplete="off">
                      <div class="form-group">
                        <input type="text" name="user" id="user" class="form-control form-control-lg rounded-0" placeholder="Usuario" required>
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="pwd" class="form-control form-control-lg rounded-0" placeholder="Password" required>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" name="checkbox" id="ver" class="custom-control-input" onclick="verpass(this);">
                             <label for="ver" class="custom-control-label">Ver Contraseña</label>
                          </div>
                        </div>
                        <div class="col">
                            <a href="registros.php" class="nav-link" data-toggle="modal" data-target="#registroModal">¿Aún no tienes cuenta?</a>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success btn-lg btn-block" id="btnlogin">Acceder</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
         </div>
    </div>

  </div>
    <!-- termina_el_formulario -->
    <script>
      function verpass(cb){
        if(cb.checked)
          $('#pwd').attr("type","text");
          else
          $('#pwd').attr("type","password");
      }
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
  </body>
</html>

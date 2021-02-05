<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Iniciar sesion</title>

    <!--Estilos Css-->
    <link rel="stylesheet" type="text/css" href="../../frontend/css/stylelogin.css">
    <link rel="stylesheet" type="text/css" href="../../frontend/css/bootstrap.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../frontend/img/fondos/favicon.ico">
    <script type="text/javascript" src="../../frontend/js/sweetalert2.all.min.js"></script>
  </head>
<body>

<!---Inicio del formulario para ingresar---->
<div class="login-box">
  <i class="bg-avatar"></i>
  <i class="avatar fas fa-user-circle"></i>
  <h1 class="titulo-fonts">Iniciar sesión</h1>
  <form method="POST" id="IngresarLogin" onsubmit="IngresarLogin(); return false">
    <div class="datos-intro">
      <input type="hidden" name="accion" value="login">
      <i class="caret fas fa-user"></i>
      <input type="text" placeholder="Usuario" name="idusuario" autocomplete="off">
    </div>
    <div class="datos-intro">
      <i class="caret fas fa-lock"></i>
      <input type="password" placeholder="Contreseña" name="password">
    </div>
    <button type="submit" class="btn btn-danger w-100">Ingresar</button>
  </form>
  <a href="#" style="text-decoration: none;color: white;">¿Nuevo usuario? Crea tu cuenta </a><a href="#" data-toggle="modal" data-target="#modal">AQUÍ</a><br>
    <a href="#" style="text-decoration: none;color: white;" data-toggle="modal" data-target="#modalRecuperar">¿has olvidado tu contraseña?</a><br><br>
  <center>
    <a href="../../view/public/HomePublic.php">Volver al Inicio</a>
  </center>
</div>
<!---Final del formulario para ingresar---->

<!---REgistro de nuevo usuario--->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-fonts">Registro</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" method="POST" id="formulario" onsubmit="RegistrarCliente(); return false">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-inline campo-general">
                    <input type="hidden" name="accion" value="agregar">
                    <input  name="idusuario" type="text" placeholder="Nombre de usuario" class="form-control col-lg-8 col-sm-8">
                    <input  name="cedula" type="number" placeholder="Cedula" class="form-control col-lg-4 col-sm-4">
                  </div>
                  <div class="form-inline campo-general">
                    <input  name="nombre" type="text" placeholder="Nombre" class="form-control col-lg-6 col-sm-6">
                    <input  name="apellido" type="text" placeholder="Apellido" class="form-control col-lg-6 col-sm-6">
                  </div>
                  <div class="form-group">
                    <input  name="correo" type="email" placeholder="Correo electrónico" id="correo" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="telefono" id="telefono" type="number" placeholder="Teléfono" class="form-control">
                  </div>
                  <div class="form-inline campo-general-date" >
                    <select name="day" class='form-control col-lg-4 col-sm-4'>
                      <option value="0">Dia</option>
                      <?php
                        for($dia=1; $dia<=31; $dia++){
                          echo '<option value="'.$dia.'">'.$dia.'</option>';
                        }
                      ?>
                    </select>
                    <select name="month" class='form-control col-lg-4 col-sm-4'>
                      <option value="0">Mes</option><option value="Enero">Enero</option><option value="Febrero">Febrero</option><option value="Marzo">Marzo</option><option value="Abril">Abril</option><option value="Mayo">Mayo</option><option value="Junio">Junio</option><option value="Julio">Julio</option><option value="Agosto">Agosto</option><option value="Septiembre">Septiembre</option><option value="Octubre">Octubre</option><option value="Noviembre">Noviembre</option><option value="Diciembre">Diciembre</option>
                    </select>
                    <select name='year' class="form-control col-lg-4 col-sm-4">
                      <option  value="0">Año</option>
                      <?php
                        $year = date("Y");
                        for ($i=1920; $i<=$year; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name='sexo' id="sexo" class='form-control'>
                      <option value="0">Género</option>
  					          <option value="Femenino">Femenino</option>
  					          <option value="Masculino">Masculino</option>
  				          </select>
                  </div>
                  <div class="form-group">
                    <input  name="password" type="password" id="password" placeholder="Contraseña" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="password2" type="password" id="password2" placeholder="Confirmar contraseña" class="form-control">
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Registrarse</button>
                </center><br>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Final del REgistro de nuevo usuario---->

<!---Modal para recuperacion de contraseña-->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modalRecuperar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-fonts">Recuperar contraseña</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" method="POST">
              <div class="col-lg-12">
                <center class="py-3"><i class="fas fa-envelope-open-text" style="font-size: 100px;"></i></center>
                <div class="form-group">
                  <input type="email" placeholder="Correo electrónico" name="RecuperarCorreo" class="form-control" required>
                </div><br>
                <center>
                  <button type="submit" class="btn btn-success"><i class="fas fa-calendar-check"></i> Solicitar</button>
                </center><hr>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!----Final del modal de recuperacion de contraseña----->

<!--Javascript-->
<script type="text/javascript" src="../../frontend/js/jquery.js"></script>
<script type="text/javascript" src="../../frontend/js/popper.js"></script>
<script type="text/javascript" src="../../frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../frontend/js/all.min.js"></script>
<script type="text/javascript" src="../../Frontend/js/query.validate.js"></script>
<script type="text/javascript" src="../../view/public/scriptPublic/Login.js"></script>
</body>
</html>

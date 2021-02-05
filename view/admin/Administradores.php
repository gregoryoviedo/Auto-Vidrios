<?php include 'includesAdmin/slidebar.php'; ?>
<!-------Aqui es el unicio de el listados de los clientes registrados-------->
<h1 class="text-center titulo-home"><i class="fas fa-user-tie"></i>  Lista de Administradores</h1>

<div class="container-fluid">
  <div class="py-2">
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
    <a href="../../reportes/administradoresReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
  </div>
  <div class="row">
    <!--Recorrido con php de cada ADMINISTRADOR del sistema-->
    <?php foreach ($adminObjeto as $mostrarCiclo) { ?>
      <div class="col-lg-4 col-md-2 col-sm-12">
        <div class="card">
          <div class="card-body">
            <center>
              <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="img-fluid rounded-circle w-50">
            </center>
            <h1 class="text-center titulo-home"><?php echo $mostrarCiclo->idusuario; ?></h1>
            <p>
              <p class="badge badge-dark">Id Nro:</p>
              <?php echo $mostrarCiclo->id; ?><br>
              <p class="badge badge-dark">Cedula:</p>
              <?php echo $mostrarCiclo->cedula; ?><br>
              <p class="badge badge-dark">Nombre:</p>
              <?php echo $mostrarCiclo->nombre; ?><br>
              <p class="badge badge-dark">Apellido:</p>
              <?php echo $mostrarCiclo->apellido; ?><br>
              <p class="badge badge-dark">Nro de telefono:</p>
              <?php echo $mostrarCiclo->telefono; ?><br>
              <p class="badge badge-dark">Correo:</p>
              <?php echo $mostrarCiclo->correo; ?><br>
              <p class="badge badge-dark">Registrado el::</p>
              <?php echo $mostrarCiclo->creacion; ?><br>
            </p>
            <div class="float-right">
              <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->idusuario; ?>','<?php echo $mostrarCiclo->foto_url; ?>')"><i class="fas fa-trash-alt"></i></button>
              <button class="btn btn-warning btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!---Modal para INSERTAR un nuevo administrador--->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Nuevo administrador</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" id="formulario" onsubmit="RegistrarAdministrador(); return false">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-inline campo-general">
                    <input type="hidden" name="accion" value="agregar">
                    <input  name="idusuario" id="idusuario" placeholder="Nombre de usuario" class="form-control col-lg-8 col-sm-8">
                    <input  name="cedula" id="cedula" type="number" placeholder="Cedula" class="form-control col-lg-4 col-sm-4">
                  </div>
                  <div class="form-inline campo-general">
                    <input  name="nombre" id="nombre" placeholder="Nombre" class="form-control col-lg-6 col-sm-6">
                    <input  name="apellido" id="apellido" placeholder="Apellido" class="form-control col-lg-6 col-sm-6">
                  </div>
                  <div class="form-group">
                    <input  name="telefono" id="telefono" type="number" placeholder="Teléfono" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="correo" id="correo" type="email" placeholder="Correo electronico" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="password" id="password" type="password" placeholder="Contraseña" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="password2" id="password2" type="password" placeholder="Confirmar contraseña" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="imagen" accept=".jpg , .png , .gif">
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Registrar</button>
                  <button type="button" class="btn btn-danger" button='agregar' data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i> Cancelar</button>
                </center><br>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!---Modal encargada de carga la VISTA de editar segun el id--->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Editar administrador</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="AdministradoresController.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body mx-0 px-0">
                <div class="col-lg-12" id="cargarVista"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includesAdmin/footer.php'; ?>
<script type="text/javascript" src="../../view/admin/scriptAdmin/AdministradoresScript.js"></script>
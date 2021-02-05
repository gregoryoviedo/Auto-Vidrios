<?php include 'includesAdmin/slidebar.php'; ?>
<!-------Aqui es el unicio de el listados de los clientes registrados-------->       
<h1 class="text-center titulo-home"><i class="fas fa-hammer"></i>  Lista de Empleados</h1>

<div class="container-fluid py-3 bg-light px-4">
  <div class="py-2">
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
    <a href="../../reportes/EmpleadosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
  </div>
  <?php foreach ($empleadoObjeto as $mostrarCiclo) { ?>
  <div class="card bg-white my-2">
    <div class="row ">
      <div class="col-md-4 col-lg-2">
        <img src="<?php echo $mostrarCiclo->foto_url; ?>" class="img-fluid rounded-circle py-5 pl-3">
      </div>
      <div class="col-md-8 px-3 col-lg-10">
        <div class="card-block pl-0 pr-4">
          <h4 class="card-title titulo-home" style="font-size:50px;"><?php echo $mostrarCiclo->idusuario; ?></h4>
          <div class="row">
            <div class="col-lg-6">
              <p class="badge badge-dark">Id Nro</p>
              <?php echo $mostrarCiclo->id; ?><br>
              <p class="badge badge-dark">Cedula</p>
              <?php echo $mostrarCiclo->cedula; ?><br>
              <p class="badge badge-dark">Nombre</p>
              <?php echo $mostrarCiclo->nombre; ?><br>
              <p class="badge badge-dark">Apellido</p>
              <?php echo $mostrarCiclo->apellido; ?><br>
            </div>
            <div class="col-lg-6">
              <p class="badge badge-dark">Telefono</p>
              <?php echo $mostrarCiclo->telefono; ?><br>
              <p class="badge badge-dark">Correo</p>
              <?php echo $mostrarCiclo->correo; ?><br>
              <p class="badge badge-dark">Rif</p>
              <?php echo $mostrarCiclo->rif; ?><br>
              <p class="badge badge-dark">Creacion</p>
              <?php echo $mostrarCiclo->creacion; ?><br>
            </div>
          </div>
          <div class="float-right">
            <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->idusuario;?>','<?php echo $mostrarCiclo->foto_url;?>')"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-warning btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
          </div>
          </div>
        </div>
      </div>
   </div>
  <?php } ?>
</div>

  <div class="container">
      <div class="row">
        <div class="col">
          <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Registrar empleado</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="EmpleadosController.php" method="POST" id="validacion" enctype="multipart/form-data">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-inline campo-general">
                    <input type="hidden" name="accion" value="agregar">                  
                    <input  name="idusuario" id="idusuario" placeholder="Nombre de usuario" class="form-control col-lg-8 col-sm-8" >
                    <input  name="cedula" id="cedula" type="number" placeholder="Cedula" class="form-control col-lg-4 col-sm-4" >
                  </div>
                  <div class="form-inline campo-general">        
                    <input  name="nombre" id="nombre" placeholder="Nombre" class="form-control col-lg-6 col-sm-6" > 
                    <input  name="apellido" id="apellido" placeholder="Apellido" class="form-control col-lg-6 col-sm-6" >  
                  </div>
                  <div class="form-group">
                    <input  name="telefono" id="telefono" type="number" placeholder="Teléfono" class="form-control" >
                  </div>
                  <div class="form-group">
                    <input  name="correo" id="correo" type="email" placeholder="correo" class="form-control" >
                  </div>
                  <div class="form-group">
                    <input  name="rif" id="rif" type="text" placeholder="Rif" class="form-control" >
                  </div>
                  <div class="form-group">
                    <input  name="password" id="p1" type="password" placeholder="Contraseña" class="form-control" >
                  </div>
                  <div class="form-group">
                    <input type="password" name="password2" placeholder="Confirmar contraseña" class="form-control">
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

<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Editar empleado</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="EmpleadosController.php" method="POST" enctype="multipart/form-data">
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
<script>

function actualizar(id){
  $('#modal2').modal('show');
  $('#cargarVista').load('EmpleadosController.php?accion=actualizar&id=' + id);
}

function eliminar(id,idusuario,foto_url) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a eliminar a "+idusuario+" de la lista de empleados",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'EmpleadosController.php?accion=eliminar&id='+id + "&foto_url=" + foto_url;
          location.href=url;
      Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
      )
    }
  })
}

</script>
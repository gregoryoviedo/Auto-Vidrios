<?php include 'includesAdmin/slidebar.php'; ?>
<!-------Aqui es el unicio de el listados de los clientes registrados-------->
<h1 class="text-center titulo-home"><i class="fa fa-box-open"></i> Lista de materiales</h1>

<div class="container-fluid">
  <div class="py-2">
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
    <a href="../../reportes/MaterialesReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
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
            <h1 class="text-center titulo-home"><?php echo $mostrarCiclo->material; ?></h1>
            <p>
              <p class="badge badge-dark">Id Nro:</p>
              <?php echo $mostrarCiclo->cantidad; ?><br>
            </p>
            <div class="float-right">
              <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->material; ?>','<?php echo $mostrarCiclo->foto_url; ?>')"><i class="fas fa-trash-alt"></i></button>
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
              <h2 class="modal-title titulo-home">Nuevo Material</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="MaterialesController.php" method="POST" enctype="multipart/form-data">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">     
                  <div class="form-group">
                  <input type="hidden" name="accion" value="agregar">
                    <input  name="material" id="material" type="text" placeholder="Ingrese el material" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input  name="cantidad" id="cantidad" type="number" placeholder="Ingrese la cantidad" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <input type="file" name="imagen" accept=".jpg , .png , .gif" required>
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
            <div class="col-lg-12" id="cargarVista"></div>
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
  $('#cargarVista').load('MaterialesController.php?accion=actualizar&id=' + id);
}

function eliminar(id,material,foto_url) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a eliminar a "+material+" de la lista de materiales",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'MaterialesController.php?accion=eliminar&id='+id + "&foto_url=" + foto_url;
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
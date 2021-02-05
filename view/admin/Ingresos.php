<?php include 'includesAdmin/slidebar.php'; ?>

<!-----Aqui es el unicio de el listados de los clientes registrados----->
<h1 class="text-center titulo-home"><i class="fas fa-money-bill-alt"></i> Lista de ingresos</h1>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
      <a href="../../reportes/IngresosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
        <div class="table-responsive bg-white" style="font-size: 12px;">
          <table class="table table">
            <thead class="bg-black text-light titulo-home" style="font-size: 15px;">
              <tr>
                <th>Usuario</th>
                <th>Fecha</th> 
                <th>Servicio</th> 
                <th>Empleado</th> 
                <th>Monto</th> 
                <th>Acciones</th>   
              </tr>
            </thead>
          <tbody>         
            <?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
              <tr>
                <td><?php echo $mostrarCiclo->idusuario; ?></td>
                <td><?php echo $mostrarCiclo->fecha; ?></td>
                <td><?php echo $mostrarCiclo->servicio; ?></td>
                <td><?php echo $mostrarCiclo->empleado; ?></td>
                <td><?php echo $mostrarCiclo->monto; ?></td>
                <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id; ?>,'<?php echo $mostrarCiclo->idusuario; ?>')"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-warning btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
                <button class="btn btn-info btn-sm" onclick="ver(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-eye"></i></button>
                </td>
              </tr>
            <?php } ?>     
          </tbody>  
        </table>
      </div>
    </div>
  </div> 
</div> 
<!------Final del listado de clientes-------->

<!-----REgistro de nuevo usuario------->
<div class="container">
  <div class="row">
    <div class="col">   
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Nuevo Ingreso</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="IngresosController.php" method="POST">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <input type="hidden" name="accion" value="agregar">
                  <div class="form-group">
                    <select name="empleado" id="" class="form-control">
                        <option value="">Empleado</option>
                        <?php foreach ($objetoEmpleado as $recorrido) { ?>
                            <option value="<?php echo $recorrido->idusuario ?>"><?php echo $recorrido->idusuario ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="servicio" id="" class="form-control">
                        <option value="">Servicio</option>
                        <?php foreach ($objetoServicio as $recorrido) { ?>
                            <option value="<?php echo $recorrido->servicio ?>"><?php echo $recorrido->servicio ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input  name="descripcion" id="correo" type="text" placeholder="Descipcion" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input  name="cliente" id="correo" type="text" placeholder="Cliente" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input  name="monto" id="correo" type="number" placeholder="Monto" class="form-control" required>
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
<!-----Final de registro de un nuevo usuario------>  

<!-----Inicio del Modal para editar un usuario------>
<div class="container">
  <div class="row">
    <div class="col">   
      <div class="modal fade" id="modalEditar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Editar Ingreso</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="IngresosController.php" method="POST" >
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
<!-----Final del Modal para editar un usuario------>

<div class="container">
  <div class="row">
    <div class="col">   
      <div class="modal fade" id="modalVer">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Ver Ingreso</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="IngresosController.php" method="POST" >
              <div class="modal-body mx-0 px-0">
                <div class="col-lg-12" id="verInformacion"></div>
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
  $('#modalEditar').modal('show');
  $('#cargarVista').load('ingresosController.php?accion=actualizar&id=' + id);
}

function ver(id){
  $('#modalVer').modal('show');
  $('#verInformacion').load('ingresosController.php?accion=ver&id=' + id);
}

function eliminar(id,idusuario) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: idusuario+" seguro que quieres eliminar este ingreso",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'ingresosController.php?accion=eliminar&id='+id;
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

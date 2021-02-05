<?php include 'includesAdmin/slidebar.php'; ?>

<!-----Aqui es el unicio de el listados de los clientes registrados----->
<h1 class="text-center titulo-home"><i class="fas fa-sort-amount-down"></i>  Lista de Egresos</h1>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
      <a href="../../reportes/EgresosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
        <div class="table-responsive bg-white" style="font-size: 12px;">
          <table class="table table">
            <thead class="bg-black text-light text-center titulo-home" style="font-size: 15px;">
              <tr>
                <th>Usuario</th>
                <th>Fecha</th> 
                <th>Material</th> 
                <th>Cantidad</th> 
                <th>Acciones</th>   
              </tr>
            </thead>
          <tbody>         
            <?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
              <tr>
                <td><?php echo $mostrarCiclo->idusuario; ?></td>
                <td><?php echo $mostrarCiclo->fecha; ?></td>
                <td><?php echo $mostrarCiclo->material; ?></td>
                <td><?php echo $mostrarCiclo->cantidad; ?></td>
                <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id; ?>,'<?php echo $mostrarCiclo->cantidad; ?>','<?php echo $mostrarCiclo->cantidad_original; ?>','<?php echo $mostrarCiclo->id_material; ?>')"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-warning btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
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
              <h2 class="modal-title titulo-home">Seleccionar material</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                <div class="row">
                <?php foreach ($objetoMaterial as $recorrido) { ?>
                  <div class="col-lg-6">
                  
                  <div class="card" style="padding-bottom: 20px;">
                    <img src="<?php echo $recorrido->foto_url;  ?>" class="card-img-top">
                    <div class="card-body">
                      <h1 class="text-center titulo-home"><?php echo $recorrido->material; ?></h1>
                    </div>
                    <button class="btn btn-success" onclick="hacer(<?php echo $recorrido->id;?>)">Seleccionar</button>
                  </div>
                   
                  </div>
                  <?php } ?>   
                </div>
                  <!-- <input type="hidden" name="accion" value="agregar">
                  <div class="form-group">
                    <select name="material" id="" class="form-control">
                        <option value="">material</option>
                       
                            <option value="<?php //echo $recorrido->material ?>"><?php //echo $recorrido->material ?></option>
                                       
                    </select>
                  </div>
                  <div class="form-group">
                    <input  name="cantidad" id="correo" type="number" placeholder="cantidad" class="form-control" required>
                  </div>             
                <center>
                  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Registrar</button>
                  <button type="button" class="btn btn-danger" button='agregar' data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i> Cancelar</button>
                </center><br> -->
              </div>
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
            <form role="form" action="EgresosController.php" method="POST" >
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
      <div class="modal fade" id="modalHacer">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Nuevo Egreso</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="EgresosController.php" method="POST" >
              <div class="modal-body mx-0 px-0">
                <div class="col-lg-12" id="cargarModal"></div>
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
  $('#cargarVista').load('EgresosController.php?accion=actualizar&id=' + id);
}

function hacer(id){
  $('#modalHacer').modal('show');
  $('#cargarModal').load('EgresosController.php?accion=hacer&id=' + id);
}

function eliminar(id,cantidad,cantidad_original,id_material) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a eliminar a  de la lista de egresos",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'EgresosController.php?accion=eliminar&id='+id + '&cantidad=' + cantidad + '&cantidad_original=' + cantidad_original + '&id_material=' + id_material;
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
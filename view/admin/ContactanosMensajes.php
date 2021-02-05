<?php include 'includesAdmin/slidebar.php'; ?>
<!------------Aqui es el unicio de el listados de los clientes registrados--------->


<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center titulo-home"><i class="fas fa-envelope-open-text"></i>  Mensajes de Contactanos</h1>
        <div class="table-responsive bg-light">
          <table class="table table-striped table-hover">
            <thead class="bg-black text-light">
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Asunto</th> 
                <th>Fecha</th> 
                <th>Acciones</th>   
              </tr>
            </thead>
          <tbody> 
              <!--Comienzo de codigo php-->
            <?php
              foreach ($mensajeObjeto as $mostrarCiclo) { ?>
              <tr>
                <td><?php echo $mostrarCiclo->id; ?></td>
                <td><?php echo $mostrarCiclo->nombre; ?></td>
                <td><?php echo $mostrarCiclo->asunto; ?></td>
                <td><?php echo $mostrarCiclo->fecha; ?></td>
                <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-success btn-sm" onclick="verMas(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-eye"></i></button>
                </td>
              </tr>
            <?php } ?>     
          </tbody>  
        </table>
      </div>
    </div>
  </div> 

<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Informacion completa</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
              <div class="col-lg-12" id="cargarVista"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<?php include 'includesAdmin/footer.php'; ?>
<script>

  function verMas(id){
      $('#modal').modal('show');
      $('#cargarVista').load('ContactanosMensajesController.php?accion=carga&id=' + id);
  }

  function eliminar(id) {
   Swal.fire({
    title: '¿Estas seguro?',
    text: "Deseas eliminar este mensaje",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
    confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
    }).then((result) => {
      if (result.value) {
        var url = 'ContactanosMensajesController.php?accion=eliminar&id='+id;
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
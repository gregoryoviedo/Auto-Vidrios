<?php include 'includesAdmin/slidebar.php'; ?>
<!-------Aqui es el unicio de el listados de los clientes registrados-------->       
<h1 class="text-center titulo-home"><i class="fas fa-comments"></i> Comentarios de la pagina</h1>
  
<div class="container-fluid bg-light">
<a href="../../reportes/ComentariosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
  <h3 class="titulo-home">Comentarios de los usuarios</h3>
  <div class="row">
    <?php foreach ($objetoComentarios as $mostrar) { ?>
    <div class="col-lg-2 bg-white py-4">
      <img src="<?php echo $mostrar->foto_url;?>" class="img-fluid rounded-circle w-100">
    </div>
    <div class="col-lg-10 bg-white py-4">
      <div class="px-5">
        <h5 class="card-title"><?php echo $mostrar->idusuario; ?></h5>
        <p class="card-text"><?php echo $mostrar->comentario; ?></p>
        <p class="card-text float-right"><small class="text-muted"><?php echo $mostrar->fecha; ?></small></p>
        <div class="float-left">
          <button class="btn btn-danger" onclick="eliminar(<?php echo $mostrar->id;?>,'<?php echo $mostrar->idusuario;?>')"><i class="fas fa-trash-alt"></i></button>
          <button class="btn btn-warning" onclick="actualizar(<?php echo $mostrar->id;?>)"><i class="fas fa-edit"></i></button>
        </div>
      </div>
    </div>
    <?php } ?>
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
              <h2 class="modal-title">Editar comentario</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="ComentariosGeneralController.php" method="POST">
              <div class="col-lg-12" id="cargarVista"></div>
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
      $('#cargarVista').load('ComentariosGeneralController.php?accion=actualizar&id=' + id);
  }

  function eliminar(id,idusuario) {
   Swal.fire({
    title: '¿Estas seguro?',
    text: "Confirmas que eliminaras el comentario de "+idusuario,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
    confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
    }).then((result) => {
      if (result.value) {
        var url = 'ComentariosGeneralController.php?accion=eliminar&id='+id;
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
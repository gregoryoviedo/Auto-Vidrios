<?php include 'includeCliente/header.php'; ?>
<title>Comentarios</title>
</head>
<body class="bg-light">

<!---Encabezado del titulo de la pagina---->       
<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-center pt-5 titulo-home">Comentarios de la pagina</h1>
    </div>
  </div>
</div>
<!--Fin del encabezado de la pagina --->

<!--Campo donde se hace el proceso para comentar-->
<div class="container-fluid bg-white py-4">
  <div class="row px-5">
    <div class="col-lg-1 px-0 mx-0">
      <img src="<?php echo $_SESSION['foto_url'];?>" class="img-fluid rounded-circle">
    </div>
    <div class="col-lg-11 bg-white pr-5 mx-0">
      <form action="ComentariosController.php" method="POST">
        <dir class="form-group">
          <input type="hidden" name="accion" value="agregar">
          <textarea cols="40" rows="4" class="form-control" name="comentario" placeholder="Ingresa tu comentario"></textarea>
        </dir>
        <button type="submit" class="btn btn-info float-right">Comentar</button>
      </form>
    </div>
  </div>
</div>
<!--Fin del campo para comentar--->

<!---listado de todos los comentarios realizados--->
<div class="container bg-light py-5">
  <h3 class="titulo-home">Lo que comenta nuestros clientes</h3>
  <div class="row">
    <?php foreach ($objetoComentarios as $mostrar) { ?>
    <div class="col-lg-2 bg-white py-4">
      <img src="<?php echo $mostrar->foto_url;?>" class="img-fluid rounded-circle">
    </div>
    <div class="col-lg-10 bg-white py-4">
      <div class="px-5">
        <h5 class="card-title"><?php echo $mostrar->idusuario; ?></h5>
        <p class="card-text"><?php echo $mostrar->comentario; ?></p>
        <p class="card-text float-right"><small class="text-muted"><?php echo $mostrar->fecha; ?></small></p>
        <div class="float-left">
          <?php if ($mostrar->idusuario==$_SESSION['idusuario']) { ?>
          <button class="btn btn-danger" onclick="eliminar(<?php echo $mostrar->id;?>,'<?php echo $mostrar->idusuario;?>')"><i class="fas fa-trash-alt"></i></button>
          <button class="btn btn-warning" onclick="actualizar(<?php echo $mostrar->id;?>)"><i class="fas fa-edit"></i></button>
          <?php }else{} ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<!--fin de todos los comentarios realizados--->

<!---Modal encargada de carga la VISTA de editar segun el id--->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Editar comentario</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="ComentariosController.php" method="POST">
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
<!--Fin del modal de la carga de editar--->

<?php include 'includeCliente/footer.php'; ?>
<script>
function actualizar(id){
      $('#modal2').modal('show');
      $('#cargarVista').load('ComentariosController.php?accion=actualizar&id=' + id);
  }

  function eliminar(id,idusuario) {
   Swal.fire({
    title: '¿'+idusuario +' estas seguro?',
    text: "Este comentario va a procecer a eliminarse",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
    confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
    }).then((result) => {
      if (result.value) {
        var url = 'ComentariosController.php?accion=eliminar&id='+id;
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
<?php include 'includesAdmin/slidebar.php'; ?>

<?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
      <div class="col-lg-4 col-md-2 col-sm-12">
        <div class="card">
          <div class="card-body">
            <center>
              <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="img-fluid rounded-circle w-50">
            </center>
            <h1 class="text-center"><?php echo $mostrarCiclo->idusuario; ?></h1>
            <p>
              <p class="badge badge-dark">Cedula V-</p>
              <?php echo $mostrarCiclo->cedula; ?><br>
              <p class="badge badge-dark">Nombre:</p>
              <?php echo $mostrarCiclo->nombre; ?><br>
              <p class="badge badge-dark">Apellido:</p>
              <?php echo $mostrarCiclo->apellido; ?><br>
              <p class="badge badge-dark">Nro de telefono:</p>
              <?php echo $mostrarCiclo->telefono; ?><br>
              <p class="badge badge-dark">CorreoF:</p>
              <?php echo $mostrarCiclo->correo; ?><br>
            </p>

            <div class="float-right">
              <button class="btn btn-secondary btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
            </div>

          </div>
        </div>
      </div>

<?php } ?>



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
            <form role="form" action="PerfilController.php" method="POST" enctype="multipart/form-data">
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
  $('#cargarVista').load('PerfilController.php?accion=actualizar&id=' + id);
}

</script>
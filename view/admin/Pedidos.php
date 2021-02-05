<?php include 'includesAdmin/slidebar.php'; ?>
<!-------Aqui es el unicio de el listados de los clientes registrados-------->
<h1 class="text-center titulo-home"><i class="fas fa-file-alt"></i>  Lista de Pedidos</h1>

<div class="container-fluid">
  <div class="py-2">
    <a href="../../reportes/PedidosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
  </div>
  <div class="row">
    <!--Recorrido con php de cada ADMINISTRADOR del sistema-->
    <?php
    foreach ($objetoPedido as $mostrarCiclo) { ?>

      <div class="col-lg-4 col-md-2 col-sm-12">
        <div class="card">
          <div class="card-body">
            <center>
              <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="img-fluid rounded-circle w-50">
            </center>
            <h1 class="text-center titulo-home"><?php echo $mostrarCiclo->idusuario; ?></h1>
            <p>
              <p class="badge badge-dark">Producto:</p>
              <?php echo $mostrarCiclo->producto; ?><br>
              <p class="badge badge-dark">cantidad:</p>
              <?php echo $mostrarCiclo->cantidad; ?><br>
              <p class="badge badge-dark">total:</p>
              <?php echo $mostrarCiclo->total; ?><br>
              <p class="badge badge-dark">busqueda:</p>
              <?php echo $mostrarCiclo->busqueda; ?><br>
              <p class="badge badge-dark">solicitado:</p>
              <?php echo $mostrarCiclo->solicitado; ?><br>
            </p>
            <div class="float-right">
              <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->idusuario; ?>','<?php echo $mostrarCiclo->cantidad;?>','<?php echo $mostrarCiclo->cantidad_original;?>','<?php echo $mostrarCiclo->id_producto;?>')"><i class="fas fa-trash-alt"></i></button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include 'includesAdmin/footer.php'; ?>

<script>
function eliminar(id,idusuario,cantidad,cantidad_original,id_producto) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a eliminar el pedido de "+idusuario,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'PedidosController.php?accion=eliminar&id='+id + "&cantidad=" + cantidad + '&cantidad_original=' + cantidad_original + '&id_producto=' + id_producto;
          location.href=url;
      Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
      )
    }
  })
}</script>

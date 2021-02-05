<?php include 'includesAdmin/slidebar.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center titulo-home"><i class="fas fa-calendar-alt"></i>  Lista de citas</h1>
       <a href="../../reportes/CitasReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
      	<div class="table-responsive bg-light">
      		<table class="table table-striped table-hover">
      			<thead class="bg-black text-light">
      				<tr>
                <th>Id Cita</th>
      					<th>Usuario</th>
      					<th>Servicio solicitado</th>	
      					<th>Fecha</th>	
      					<th>Hora</th>	 
                <th>Empleado</th>  
      					<th>Acciones</th>		
      				</tr>
      			</thead>
      		<tbody> 
              <!--Comienzo de codigo php-->
      			<?php
              foreach ($objetoRetornado as $mostrarCiclo) { ?>
              <tr>
                <td><?php echo $mostrarCiclo->id; ?></td>
                <td><?php echo $mostrarCiclo->idusuario; ?></td>
                <td><?php echo $mostrarCiclo->servicio; ?></td>
                <td><?php echo $mostrarCiclo->fecha; ?></td>
                <td><?php echo $mostrarCiclo->hora; ?></td>
                <td><?php echo $mostrarCiclo->empleado; ?></td>
                <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->idusuario;?>')"><i class="fas fa-window-close"></i> Cancelar cita</button>
                </td>
              </tr>
            <?php } ?>     
      		</tbody>	
      	</table>
      </div>
    </div>
  </div> 
<?php include 'includesAdmin/footer.php'; ?>

<script type="text/javascript">
function eliminar(id,idusuario) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a cancelar la cita de " + idusuario,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'CitasController.php?accion=eliminar&id='+id;
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

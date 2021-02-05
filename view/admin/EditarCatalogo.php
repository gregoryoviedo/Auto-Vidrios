<?php foreach ($objetoEditar as $mostrarCiclo) {} ?>
<div class="modal-header">
	<h2 class="modal-title titulo-home">Editar <?php echo $mostrarCiclo->servicio; ?></h2>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<center class="py-2">
	<img src="<?php echo $mostrarCiclo->foto_url; ?>" widht="100" height="100">
</center>
<form role="form" action="PreciosController.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body mx-0 px-0">
		<div class="form-group">
			<input type="hidden" name="accion" value="actualizar">
			<input type="hidden" name="id" value="<?php echo $mostrarCiclo->id; ?>">
			<input type="text" name="servicio" value="<?php echo $mostrarCiclo->servicio; ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" name="descripcion" value="<?php echo $mostrarCiclo->descripcion; ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="number" name="precio" value="<?php echo $mostrarCiclo->precio; ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="hidden" name="fotoOriginal" value="<?php echo $mostrarCiclo->foto; ?>">
			<input type="hidden" name="fotoOriginalUrl" value="<?php echo $mostrarCiclo->foto_url; ?>">
			<input type="file" name="imagen" accept=".jpg , .png , .gif">
		</div>
	</div>    
	<center>
		<button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
	</center><br>
</form>
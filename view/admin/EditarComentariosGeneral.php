<?php foreach ($actualizarObjeto as $datosActualizar) {} ?>
<div class="form-group">
	<center>
		<img src="<?php echo $datosActualizar->foto_url;?>" class="img-fluid rounded-circle" style="width: 30%;">
	</center>
</div>

<div class="form-group">
	<input type="hidden" name="accion" value="actualizar">
	<input type="hidden" name="id" value="<?php echo $datosActualizar->id;?>">
	<input name="comentario" value="<?php echo $datosActualizar->comentario; ?>" class="form-control">
</div>
<center>
	<button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
  	<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
</center><br>
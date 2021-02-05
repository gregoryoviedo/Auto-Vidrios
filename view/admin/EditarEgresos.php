<?php foreach ($objetoRetornado as $datosActualizar) {} ?>

<div class="form-group">
<input type="hidden" name="accion" value="actualizar">
  <input type="hidden" name="id" value='<?php echo $datosActualizar->id; ?>'>
  <input type="hidden" name="cantidad_actual" value='<?php echo $datosActualizar->cantidad; ?>'>
  <input type="hidden" name="cantidad_original" value='<?php echo $datosActualizar->cantidad_original; ?>'>
  <input type="hidden" name="id_material" value='<?php echo $datosActualizar->id_material; ?>'>
  <input  name="cantidad" id="cantidad" type="number" value="<?php echo $datosActualizar->cantidad; ?>" class="form-control" required>
</div>
<center>
  <button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
</center>
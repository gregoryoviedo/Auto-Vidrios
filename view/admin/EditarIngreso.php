<?php foreach ($objetoRetornado as $datosActualizar) {} ?>
<div class="form-group">
  <input type="hidden" name="accion" value="actualizar">
  <input type="hidden" name="id" value='<?php echo $datosActualizar->id; ?>'>
  <select name="empleado" class="form-control">
    <option selected="selected"><?php echo $datosActualizar->empleado; ?></option>
    <?php foreach ($objetoEmpleado as $recorrido) { ?>
      <option value="<?php echo $recorrido->idusuario ?>"><?php echo $recorrido->idusuario ?></option>
    <?php } ?>
  </select>
</div>
<div class="form-group">
  <select name="servicio" id="" class="form-control">
    <option selected="selected"><?php echo $datosActualizar->servicio; ?></option>
    <?php foreach ($objetoServicio as $recorrido) { ?>
      <option value="<?php echo $recorrido->servicio ?>"><?php echo $recorrido->servicio ?></option>
    <?php } ?>
  </select>
</div>
<div class="form-group">
  <input  name="descripcion" id="descripcion" type="text" value="<?php echo $datosActualizar->descripcion; ?>" class="form-control" required>
</div>
<div class="form-group">
  <input  name="cliente" id="cliente" type="text" value="<?php echo $datosActualizar->cliente; ?>" class="form-control" required>
</div>
<div class="form-group">
  <input  name="monto" id="monto" type="number" value="<?php echo $datosActualizar->monto; ?>" class="form-control" required>
</div>
<center>
  <button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
</center>
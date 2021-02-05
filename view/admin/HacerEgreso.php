<?php foreach ($objetoRetornado as $recorrer) {} ?>
<div class="form-group">
  <input type="hidden" name="accion" value="agregar">
  <input type="hidden" name="id" value="<?php echo $recorrer->id; ?>">
  <input type="hidden" name="material" value="<?php echo $recorrer->material; ?>">
  <input type="hidden" name="cantidad_original" value="<?php echo $recorrer->cantidad; ?>">
</div>
<div class="form-group">
  <input  name="cantidad" type="number" placeholder="cantidad" class="form-control">
</div>
<center>
  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Solicitar</button>
  <button type="button" class="btn btn-danger" button='agregar' data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i> Cancelar</button>
</center>
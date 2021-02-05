<?php foreach ($objetoRetornado as $datosActualizar) {} ?>
<div class="form-group">
  <center>
    <img src="<?php echo $datosActualizar->foto_url; ?>" class="img-fluid rounded-circle" style="width: 30%;">
  </center>
</div>
<div class="form-inline campo-general">
  <input type="hidden" name="accion" value="actualizar">
  <input type="hidden" name="id" value='<?php echo $datosActualizar->id; ?>'>
  <input  name="idusuario" id="idusuario" value="<?php echo $datosActualizar->idusuario; ?>" class="form-control col-lg-8 col-sm-8" required>
  <input  name="cedula" id="cedula" type="number" value="<?php echo $datosActualizar->cedula; ?>" class="form-control col-lg-4 col-sm-4" required>
</div>
<div class="form-inline campo-general">        
  <input  name="nombre" id="nombre" value="<?php echo $datosActualizar->nombre; ?>" class="form-control col-lg-6 col-sm-6" required> 
  <input  name="apellido" id="apellido" value="<?php echo $datosActualizar->apellido; ?>" class="form-control col-lg-6 col-sm-6" required>  
</div>
<div class="form-group">
  <input  name="telefono" id="telefono" type="number" value="<?php echo $datosActualizar->telefono; ?>" class="form-control" required>
</div>
<div class="form-group">
  <input  name="correo" id="correo" type="email" value="<?php echo $datosActualizar->correo; ?>" class="form-control" required>
</div>
<div class="form-group">
  <input  name="rif" id="rif" type="text" value="<?php echo $datosActualizar->rif; ?>" class="form-control" required>
</div>
<div class="form-group">
  <input type="hidden" name="fotoOriginal" value="<?php echo $datosActualizar->foto; ?>">
  <input type="hidden" name="fotoOriginalUrl" value="<?php echo $datosActualizar->foto_url; ?>">
  <input type="file" name="imagen" accept=".jpg , .png , .gif">
</div>
<center>
  <button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
</center>
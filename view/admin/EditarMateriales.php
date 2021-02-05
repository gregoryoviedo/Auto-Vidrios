<?php foreach ($objetoRetornado as $datosActualizar) {} ?>
<div class="modal-header">
  <h2 class="modal-title titulo-home">Editar <?php echo $datosActualizar->material; ?></h2>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form role="form" action="MaterialesController.php" method="POST" enctype="multipart/form-data">
  <div class="modal-body mx-0 px-0">
    <div class="form-group">
      <center>
        <img src="<?php echo $datosActualizar->foto_url; ?>" class="img-fluid rounded-circle" style="width: 30%;">
      </center>
    </div>
    <div class="form-group">
    <input type="hidden" name="accion" value="actualizar">
      <input type="hidden" name="id" value='<?php echo $datosActualizar->id; ?>'>
      <input  name="material" id="material" type="text" value="<?php echo $datosActualizar->material; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <input  name="cantidad" id="cantidad" type="number" value="<?php echo $datosActualizar->cantidad; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <input type="hidden" name="fotoOriginal" value="<?php echo $datosActualizar->foto; ?>">
      <input type="hidden" name="fotoOriginalUrl" value="<?php echo $datosActualizar->foto_url; ?>">
      <input type="file" name="imagen" accept=".jpg , .png , .gif">
    </div>
  </div>
  <center>
    <button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
  </center><br>
</form>
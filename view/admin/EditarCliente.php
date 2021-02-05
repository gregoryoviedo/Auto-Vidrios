<?php foreach ($objetoRetornado as $datosActualizar) {} ?>
<div class="modal-header">
  <h2 class="modal-title titulo-home">Editar a <?php echo $datosActualizar->idusuario; ?></h2>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form role="form" action="ClienteAdminController.php" method="POST" >
  <div class="modal-body mx-0 px-0">
    <div class="form-group">
      <center>
        <img src="<?php echo $datosActualizar->foto_url; ?>" class="img-fluid rounded-circle" style="width: 30%;">
      </center>
    </div>
    <div class="form-inline campo-general">
      <input type="hidden" name="accion" value="actualizar">
      <input type="hidden" name="id" value='<?php echo $datosActualizar->id; ?>'>
      
      <input name="idusuario" id="idusuario" value="<?php echo $datosActualizar->idusuario; ?>" class="form-control col-lg-8 col-sm-8" required>
      <input name="cedula" id="cedula" type="number" value="<?php echo $datosActualizar->cedula; ?>" class="form-control col-lg-4 col-sm-4" required>
    </div>
    <div class="form-inline campo-general">        
      <input name="nombre" id="nombre" value="<?php echo $datosActualizar->nombre; ?>" class="form-control col-lg-6 col-sm-6" required> 
      <input name="apellido" id="apellido" value="<?php echo $datosActualizar->apellido; ?>" class="form-control col-lg-6 col-sm-6" required>  
    </div>
    <div class="form-group">
      <input name="correo" id="correo" type="email" value="<?php echo $datosActualizar->correo; ?>" class="form-control" required>
    </div> 
    <div class="form-group">
      <input name="telefono" id="telefono" type="number" value="<?php echo $datosActualizar->telefono; ?>" class="form-control" required>
    </div>
    <div class="form-inline campo-general-date">  
      <select name="day" id="day" class='form-control col-lg-4 col-sm-4' value="<?php echo $datosActualizar->fecha  ; ?>" required>
        <option selected="selected"><?php echo $datosActualizar->day; ?></option>
        <?php 
          for($dia=1; $dia<=31; $dia++){
            echo '<option value="'.$dia.'">'.$dia.'</option>';
          }
        ?>
      </select>
      <select name="month" id="month" class='form-control col-lg-4 col-sm-4' required>   
        <option selected="selected"><?php echo $datosActualizar->month; ?></option><option value="Enero">Enero</option><option value="Febrero">Febrero</option><option value="Marzo">Marzo</option><option value="Abril">Abril</option><option value="Mayo">Mayo</option><option value="Junio">Junio</option><option value="Julio">Julio</option><option value="Agosto">Agosto</option><option value="Septiembre">Septiembre</option><option value="Octubre">Octubre</option><option value="Noviembre">Noviembre</option><option value="Diciembre">Diciembre</option>
      </select>
      <select name='year' id="year" class="form-control col-lg-4 col-sm-4" required>
        <option selected="selected"><?php echo $datosActualizar->year; ?></option>
        <?php 
          $year = date("Y");
          for ($i=1920; $i<=$year; $i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <select name='sexo' id="sexo" class='form-control' value="<?php echo $datosActualizar->sexo; ?>">
        <option selected="selected"><?php echo $datosActualizar->sexo; ?></option>  
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
      </select>
    </div>
  </div>
  <center>
    <button type="submit" class="btn btn-success" button='actualizar'><i class="fas fa-sync"></i> Actualizar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cancelar</button>
  </center><br>
</form>

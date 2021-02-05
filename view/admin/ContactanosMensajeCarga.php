<?php foreach ($unicoObjeto as $recorrer) {} ?>
<div class="input-group py-3">
  <div class="input-group-prepend">
     <div class="input-group-text titulo-home" id="btnGroupAddon2">Nombre</div>
  </div>
  <p class="card-text form-control"><?php echo $recorrer->nombre; ?></p>
</div>
<div class="form-group">
<div class="input-group py-3">
  <div class="input-group-prepend">
    <div class="input-group-text titulo-home" id="btnGroupAddon2">Correo</div>
  </div>
  <p class="card-text form-control"><?php echo $recorrer->correo; ?></p>
</div>
<div class="form-group">
<div class="input-group py-3">
  <div class="input-group-prepend">
    <div class="input-group-text titulo-home" id="btnGroupAddon2">Asunto</div>
  </div>
  <p class="card-text form-control"><?php echo $recorrer->asunto; ?></p>
</div>
<div class="form-group">
<div class="input-group py-3">
  <div class="input-group-prepend">
    <div class="input-group-text titulo-home" id="btnGroupAddon2">Mensaje</div>
  </div>
  <p class="card-text form-control"><?php echo $recorrer->mensaje; ?></p>
</div>
<div class="form-group">
<div class="input-group py-3">
  <div class="input-group-prepend">
    <div class="input-group-text titulo-home" id="btnGroupAddon2">Fecha</div>
  </div>
  <p class="card-text form-control"><?php echo $recorrer->fecha; ?></p>
</div>
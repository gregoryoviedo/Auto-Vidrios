<?php foreach ($objetoRetornado as $visualizar) {} ?>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">idusuario</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->idusuario; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Servicio</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->servicio; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Descipcion</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->descripcion; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Cliente</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->cliente; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Monto</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->monto; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Empleado</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->empleado; ?></p>
</div>
<div class="input-group py-3">
    <div class="input-group-prepend">
        <div class="input-group-text titulo-home" id="btnGroupAddon2">Fecha</div>
    </div>
    <p class="card-text form-control"><?php echo $visualizar->fecha; ?></p>
</div>
<center>
  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="far fa-window-close"></i> Cerrar</button>
</center>

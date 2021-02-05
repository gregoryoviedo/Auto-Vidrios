<div class="table-responsive bg-light">
  <table class="table table-striped table-hover">
    <thead class="bg-black text-light">
      <tr>
        <th class="text-center">Producto</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Busqueda</th>	
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody> 
      <?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
        <tr>
          <td><?php echo $mostrarCiclo->producto; ?></td>
          <td><?php echo $mostrarCiclo->cantidad; ?></td>
          <td><?php echo $mostrarCiclo->busqueda; ?></td>
          <td><button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id;?>,'<?php echo $mostrarCiclo->cantidad;?>','<?php echo $mostrarCiclo->cantidad_original;?>','<?php echo $mostrarCiclo->id_producto;?>')"><i class="fas fa-window-close"></i></button></td>
        </tr>
      <?php } ?>     
    </tbody>
  </table>
</div>
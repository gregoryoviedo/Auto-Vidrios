<?php include 'includesAdmin/slidebar.php'; ?>

<div class="container-fluid bg-light py-2">
	<div class="row">
		<div class="col-lg-3">
		<div class="card">
          <div class="card-body py-2 bg-danger">
          	<?php foreach ($NumClientes as $contador) {} ?>
            <h1 class="text-light"><?php echo $contador->id; ?></h1>
            <i class="fas fa-user-circle" style="color:#D01212;position: absolute;font-size: 70px;margin-left: 175px;margin-top: -40px;"></i>
            <p class="text-light">Clientes registrados</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item my-0 py-1 text-center " style="background: #D01212;"><a href="../../Controller/admin/ClienteAdminController.php?accion=mostrar" class="text-light">Ver más <i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
		</div>
		<div class="col-lg-3">
		<div class="card">
          <div class="card-body py-2 bg-primary">
            <?php foreach ($NumAdministradores as $contador) {} ?>
            <h1 class="text-light"><?php echo $contador->id; ?></h1>
            <i class="fas fa-user-tie" style="color:#105FD0;position: absolute;font-size: 70px;margin-left: 190px;margin-top: -40px;"></i>
            <p class="text-light">Administradores registrados</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item my-0 py-1 text-center " style="background: #105FD0;"><a href="../../Controller/admin/AdministradoresController.php?accion=mostrar" class="text-light">Ver más <i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
		</div>
		<div class="col-lg-3">
		<div class="card">
          <div class="card-body py-2 bg-success">
            <?php foreach ($NumEmpleados as $contador) {} ?>
            <h1 class="text-light"><?php echo $contador->id; ?></h1>
            <i class="fas fa-hammer" style="color:#148E1D;position: absolute;font-size: 70px;margin-left: 180px;margin-top: -40px;"></i>
            <p class="text-light">Empleados registrados</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item my-0 py-1 text-center " style="background: #148E1D;"><a href="../../Controller/admin/EmpleadosController.php?accion=mostrar" class="text-light">Ver más <i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
		</div>
		<div class="col-lg-3">
		<div class="card">
          <div class="card-body py-2 bg-warning">
            <?php foreach ($NumContactanos as $contador) {} ?>
            <h1 class="text-dark"><?php echo $contador->id; ?></h1>
            <i class="fas fa-envelope-open-text" style="color: #E3C30C;position: absolute;font-size: 70px;margin-left: 180px;margin-top: -40px;"></i>
            <p class="text-dark">Mensajes en bandeja</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item my-0 py-1 text-center " style="background: #E3C30C;"><a href="../../Controller/admin/ContactanosMensajesController.php?accion=view" class="text-dark">Ver más <i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
		</div>
	</div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-5">
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="col-lg-3">
      <canvas id="myChart-two" width="400" height="400"></canvas>
      <canvas id="myChart-three" width="100" height="100"></canvas>   
    </div>
    <div class="col-lg-3">
      
    </div> 

  </div>
</div>

<?php include 'includesAdmin/footer.php'; ?>

<script>
  var ctx= document.getElementById("myChart").getContext("2d");
  var myChart= new Chart(ctx,{
      type:"pie",
      data:{
          labels:['Pivotes','Motores','Vidrios'],
          datasets:[{
              label:'Num datos',
              data:[10,9,15],
              backgroundColor:[
                  'rgb(66, 134, 244,0.5)',
                  'rgb(74, 135, 72,0.5)',
                  'rgb(229, 89, 50,0.5)'
              ]
          }]
      },
      options:{
          scales:{
              yAxes:[{
                  ticks:{
                      beginAtZero:true
                  }
              }]
          }
      }
  });

  var ctx = document.getElementById('myChart-two').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });


</script>
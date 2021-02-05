<?php 
require '../../model/admin/DashboardModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class DashboardController extends DashboardModel{

	public function verificarMostrar(){
		$NumClientes=$this->Clientes();
		$NumAdministradores=$this->Administradores();
		$NumEmpleados=$this->Empleados();
		$NumContactanos=$this->Contactanos();
		require '../../view/admin/Dashboard.php';
	}

}

	if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
		$instanciaControlador=new DashboardController();
		$instanciaControlador->verificarMostrar();
	}

?>
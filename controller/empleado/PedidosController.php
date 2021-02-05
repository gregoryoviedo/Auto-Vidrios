<?php
require '../../model/empleado/PedidosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="administrador" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PedidosController extends PedidosModel{

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrarEmpleado(){
		$objetoPedido=$this->mostrar();
		require '../../view/empleado/VerPedidos.php';
	}
	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: PedidosController.php?accion=empleado");
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista a los EMPLEADOS
if (isset($_GET['accion']) && $_GET['accion']=="empleado") {
	$instanciaControlador=new PedidosController();
	$instanciaControlador->verificarMostrarEmpleado();
}

?>
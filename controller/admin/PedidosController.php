<?php
require '../../model/admin/PedidosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PedidosController extends PedidosModel{

	//funcion encargarda de ELIMINAR segun su ID
	public function verificarEliminar($id,$devolverStock,$id_producto) {
		$this->id=$id;
		$this->eliminar();
		$this->devolverStock=$devolverStock;
		$this->id_producto=$id_producto;
		$this->rellenarStock($devolverStock,$id_producto);
		$this->redireccionarMostrar();
	}

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrar(){
		$objetoPedido=$this->mostrar();
		require '../../view/admin/Pedidos.php';
	}

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrarEmpleado(){
		$objetoPedido=$this->mostrar();
		require '../../view/empleado/VerPedidos.php';
	}
	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: PedidosController.php?accion=mostrar");
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new PedidosController();
	$instanciaControlador->verificarMostrar();
}

//Condicional encargada de ELIMINAR segun su ID
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new PedidosController();
	$id=$_GET['id'];
	$cantidad=$_GET['cantidad'];
	$cantidad_original=$_GET['cantidad_original'];
	$id_producto=$_GET['id_producto'];
	$devolverStock=$cantidad_original+$cantidad;
	$instanciaControlador->verificarEliminar($id,$devolverStock,$id_producto);
	
	
}



?>
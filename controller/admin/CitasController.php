<?php 
require '../../model/admin/CitasModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class CitasController extends CitasModel{
	public function __construct(){}
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function verificarMostrar(){
		$objetoRetornado=$this->mostrar();
		require '../../view/admin/Citas.php';
	}


	public function redireccionarMostrar(){
		header("location: CitasController.php?accion=mostrar");
	}
}

	if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
		$instanciaControlador=new CitasController();
		$instanciaControlador->verificarMostrar();
	}

	if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
		$instanciaControlador=new CitasController();
		$id=$_GET['id'];
		$instanciaControlador->verificarEliminar($id);
	}


?>
<?php 
require '../../model/empleado/MisCitasModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="administrador" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class MisCitasController extends MisCitasModel{
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function verificarMostrar($user){
		$this->user=$user;
		$citaObjeto=$this->mostrarCita();
		require '../../view/empleado/MisCitas.php';
	}

	public function redireccionarMostrar(){
		header("location: MisCitasController.php?accion=mostrar");
	}
}

//condicional encargada de MOSTRAR que tiene pediente el empleado
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new MisCitasController();
	$user=$_SESSION['idusuario'];
	$instanciaControlador->verificarMostrar($user);
}

//condicional encargada de ELIMINAR la cita realizada por el cliente
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new MisCitasController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

?>
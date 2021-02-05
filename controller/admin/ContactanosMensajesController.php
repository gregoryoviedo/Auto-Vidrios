<?php 
require '../../model/admin/ContactanosMensajesModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class ContactanosMensajesController extends ContactanosMensajesModel{
	public function __construct(){}
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function ver($id){
		$this->id=$id;
		$unicoObjeto=$this->verMas();
		require '../../view/admin/ContactanosMensajeCarga.php';
	}

	public function verificarMostrar(){
		$mensajeObjeto=$this->mostrar();
		require '../../view/admin/ContactanosMensajes.php';
	}

	public function redireccionarMostrar(){
		header("location: ContactanosMensajesController.php?accion=view");
	}
}


	if (isset($_GET['accion']) && $_GET['accion']=="view") {
		$instanciaControlador=new ContactanosMensajesController();
		$instanciaControlador->verificarMostrar();
	}

	if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
		$instanciaControlador=new ContactanosMensajesController();
		$id=$_GET['id'];
		$instanciaControlador->verificarEliminar($id);
	}

	if (isset($_GET['accion']) && $_GET['accion']=="carga") {
		$instanciaControlador=new ContactanosMensajesController();
		$instanciaControlador->ver($_GET['id']);
	}	



?>
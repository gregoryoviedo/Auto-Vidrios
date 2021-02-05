<?php 
require '../../model/admin/ComentariosGeneralModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class ComentariosGeneralController extends ComentariosGeneralModel{

	public function verificarActualizar($id) {
		$this->id=$id;
		$actualizarObjeto=$this->actualizar();
		require '../../View/admin/EditarComentariosGeneral.php';
	}

	public function verificarActualizarInsertar($id,$comentario) {
		$this->id=$id;
		$this->comentario=$comentario;
		$this->actualizarInsertar($id);
		$this->redireccionarMostrar();
	}
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function verificarMostrar(){
		$objetoComentarios=$this->mostrar();
		require '../../view/admin/ComentariosGeneral.php';
	}

	public function redireccionarMostrar(){
		header("location: ComentariosGeneralController.php?accion=mostrar");
	}
}

if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new ComentariosGeneralController();
	$instanciaControlador->verificarMostrar();
}

if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new ComentariosGeneralController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new ComentariosGeneralController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new ComentariosGeneralController();
	$instanciaControlador->verificarActualizarInsertar(
	$_POST['id'],
	$_POST['comentario']);
}

?>
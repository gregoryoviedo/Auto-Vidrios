<?php 
require '../../model/cliente/ComentariosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class ComentariosController extends ComentariosModel{

	public function verificarAgregar($idusuario,$foto_url,$comentario){
		//Funcion para validar campos del formulario login
		
		$this->agregar($idusuario,$foto_url,$comentario);
		$this->redireccionarMostrar();
	}
	public function verificarActualizar($id) {
		$this->id=$id;
		$actualizacion=$this->actualizar();
		require '../../View/cliente/EditarComentarios.php';
	}

	public function CerrarSesion() {
		session_destroy();
		$this->rediccionarCerradoVerifir();
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
		require '../../view/cliente/Comentarios.php';
	}

	public function redireccionarMostrar(){
		header("location: ComentariosController.php?accion=mostrar");
	}
}


if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if (isset($_POST['comentario'])) {
	$instanciaControlador=new ComentariosController();
	$idusuario=$_SESSION['idusuario'];
	$foto_url=$_SESSION['foto_url'];
		if (empty($_POST['comentario']) && $_POST['comentario'][0] != " " ) {
			echo "el campo esta vacio";
		}else{
			$instanciaControlador->verificarAgregar($idusuario,$foto_url,$_POST['comentario']);
		}
	}
}

if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new ComentariosController();
	$instanciaControlador->verificarMostrar();
}

if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new ComentariosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new ComentariosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new ComentariosController();
	$instanciaControlador->verificarActualizarInsertar(
		$_POST['id'],
		$_POST['comentario']);
}

?>
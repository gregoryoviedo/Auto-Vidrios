<?php 
require '../../model/cliente/PerfilModel.php';
require '../public/IniciarController.php';

$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PerfliController extends PerfilModel{

	/*======================
	FUNCIONALIDADES DEL CRUD
	=======================*/

	//Funcion encargada de MOSTRAR la vista
	public function verificarMostrar($user) {
		$this->user=$user;
		$objetoRetornado=$this->mostrarPerfil();
		require '../../view/cliente/Perfil.php';
	}

	//Funcion encargada de traer kis datis cirrectir neduante una consulta
	public function verificarActualizar($id) {
		$this->id=$id;
		$actualizarObjeto=$this->actualizar();
		require '../../View/cliente/EditarPerfil.php';
	}

	//Funcion encargada de ACTUALIZAR los datos del usuario
	public function verificarActualizarInsertar($id,$idusuario,$cedula,$nombre,$apellido,$telefono,$foto,$foto_url) {
		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->telefono=$telefono;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->actualizarInsertar($id);
		$this->redireccionarMostrar();
	}








	/* public function cambiarPassword($user,$nueva,$antigua) {
		$this->antigua=$antigua;
		$this->nueva=$nueva;
		$this->user=$user;
		$VerificarPassword=$this->BuscarPassword();
		foreach ($VerificarPassword as $change) {
			if (password_verify($antigua, $change->password)) {
			echo $change->password;s
			//$this->nuevaPassword();
			//$this->redireccionarMostrar();
			}else{
				echo "la contraseña actual no es correcta";
			}
		}
	} */








	//Funcion para redireccionar a la vista del perfil
	public function redireccionarMostrar(){
		header("location: PerfilController.php?accion=viewperfil");
	}
}
/*=========================================
CONDICIONALES DE EL APARTADO DE VER PERFIL
=========================================*/

//Condicional encargada de verificar el Idusuario y mostrarle su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="viewperfil") {
	$instanciaControlador=new PerfliController();
	$user=$_SESSION['idusuario'];
	$instanciaControlador->verificarMostrar($user);
}

//Condicional encargada de traer los datos del usuario segun su ID
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new PerfliController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}


//Condicional encargada de captar los datos enviados para ACTUALIZAR
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new PerfliController();
	$fotoOriginal=$_POST['fotoOriginal'];
	$fotoOriginalUrl=$_POST['fotoOriginalUrl'];
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/usuarios/" .$foto;
	if (empty($fototemporal)) {
		$foto=$fotoOriginal;
		$foto_url=$fotoOriginalUrl;
	}else{
		unlink($fotoOriginalUrl);
		copy($fototemporal,$foto_url);
	}
	$instanciaControlador->verificarActualizarInsertar(
		$_POST['id'],
		$_POST['idusuario'],
		$_POST['cedula'],
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['telefono'],
		$foto,
		$foto_url);
}

//Condicional encargada de agarrar los datos y verificar para cambiao de contraseña
if (isset($_POST['accion']) && $_POST['accion']=="canbio") {
	$instanciaControlador=new PerfliController();
	$user=$_SESSION['idusuario'];
	$antigua=$_POST['antigua'];
	$nueva=$_POST['nueva'];
	$nueva2=$_POST['nueva2'];
		if ($nueva==$nueva2) {
			$instanciaControlador->cambiarPassword($user,$nueva,$antigua);
		}else{
			echo "las contraseñas no son iguales";
		}		
}
?>
<?php 
require '../../model/admin/EmpleadosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class EmpleadosController extends EmpleadosModel{

	public function verificarAgregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$rif,$password,$foto,$foto_url){
		//Funcion para validar campos del formulario login

		$this->agregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$rif,$password,$foto,$foto_url);
		$this->redireccionarMostrar();
	}
	public function verificarActualizar($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/EditarEmpleado.php';
	}

	public function verificarActualizarInsertar($id,$idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$rif,$foto,$foto_url) {
		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->telefono=$telefono;
		$this->correo=$correo;
		$this->rif=$rif;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->actualizarInsertar($id);
		$this->redireccionarMostrar();

	}
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function verificarMostrar(){
		$empleadoObjeto=$this->mostrar();
		require '../../view/admin/Empleados.php';
	}

	public function redireccionarMostrar(){
		header("location: EmpleadosController.php?accion=mostrar");
	}
}

if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " " && $_POST['rif'] !="" And $_POST['rif'] !=" " && $_POST['rif'][0] != " " && $_POST['password'] !="" And $_POST['password'] !=" " && $_POST['password'][0] != " " && $_POST['password2'] !="" And $_POST['password2'] !=" " && $_POST['password2'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {						
					if ($_POST['password'] != $_POST['password2']) {
						echo "las contraseñas no son iguales";
					}else{
						$instanciaControlador=new EmpleadosController();
						$foto=$_FILES['imagen']['name'];
						$fototemporal=$_FILES['imagen']['tmp_name'];
						$foto_url="../../frontend/files/usuarios/" .$foto;
						copy($fototemporal,$foto_url);
						$instanciaControlador->verificarAgregar($_POST['idusuario'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['rif'],$_POST['password'],$foto,$foto_url);
					}					
				}else{
					echo "correo no valido";
				}					
			}else{
				echo "numero de telefono no valido";
			}
		}else{
			echo "Cedula no valida";
		}
	}else{
		echo "Existen campos en blanco o con espacioados";
	}
}

if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new EmpleadosController();
	$instanciaControlador->verificarMostrar();
}

if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new EmpleadosController();
	$id=$_GET['id'];
	$foto_url=$_GET['foto_url'];
	unlink($foto_url);
	$instanciaControlador->verificarEliminar($id);
}

if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new EmpleadosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	/*if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " " && $_POST['rif'] !="" And $_POST['rif'] !=" " && $_POST['rif'][0] != " " && $_POST['password'] !="" And $_POST['password'] !=" " && $_POST['password'][0] != " " && $_POST['password2'] !="" And $_POST['password2'] !=" " && $_POST['password2'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {						
					if ($_POST['password'] != $_POST['password2']) {
						echo "las contraseñas no son iguales";
					}else{*/
					$instanciaControlador=new EmpleadosController();
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
						$_POST['correo'],
						$_POST['rif'],
						$foto,
						$foto_url);
					/*}					
				}else{
					echo "correo no valido";
				}					
			}else{
				echo "numero de telefono no valido";
			}
		}else{
			echo "Cedula no valida";
		}
	}else{
		echo "Existen campos en blanco o con espacioados";
	}	*/
}
?>
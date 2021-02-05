<?php
require '../../model/admin/AdministradoresModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class AdministradoresController extends AdministradoresModel{

	//Funcion encarga de INSERTA un nuevo administrador
	public function verificarAgregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$password,$foto,$foto_url){
		//metodo que hara las VERIFICACION de ciertos campos
		$validacionObjetoIdusuario=$this->validarIdusuario($idusuario);
		$validacionObjetoCedula=$this->validarCedula($cedula);
		$validacionObjetoCorreo=$this->validarCorreo($correo);
		$validacionObjetoTelefono=$this->validarTelefono($telefono);
		if (empty($validacionObjetoIdusuario)&&empty($validacionObjetoCedula)&&empty($validacionObjetoCorreo)&&empty($validacionObjetoTelefono)) {
			//metodo que hara el proceso de AGREGAR
			$this->agregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$password,$foto,$foto_url);
			echo "completado";
		}elseif (!empty($validacionObjetoIdusuario)) {
			echo "Este usuario ya existe";
		}elseif (!empty($validacionObjetoCedula)) {
			echo "Este cedula ya existe crack";
		}elseif (!empty($validacionObjetoCorreo)) {
			echo "Este correo ya Este en uso";
		}elseif (!empty($validacionObjetoTelefono)) {
			echo "Este telefono ya esta registrado";
		}
	}

	//Funcion encargada de TRAER los datos para posteriormente actualizar
	public function verificarActualizar($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/EditarAdministrador.php';
	}

	//Funcion encargada de ACTUALIZAR segun el ID que llego
	public function verificarActualizarInsertar($id,$idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$foto,$foto_url) {

/*
IDEA DE JESUS DE COMO VALIDAR AL MOMENTO DE ACTUALIZAR
CONDICIONAL DE QUE SI EL CORREO ENCTONTRADO EN LA BUSCQUEDA DE BASE DE DATOS ES IGUAL 
AL CORREO QUE ESTA EN LA VARIABLE DE SESION 
QUE SE SIGA PROCESO DE ACTUALIZACION NROMAÑ
SINO QUE SE CANCELE Y QUE TIRE LA ALERTA

 */



		//metodo que hara las VERIFICACION de ciertos campos
		/* $validacionObjetoIdusuario=$this->validarIdusuario($idusuario);
		$validacionObjetoCedula=$this->validarCedula($cedula);
		$validacionObjetoCorreo=$this->validarCorreo($correo);
		$validacionObjetoTelefono=$this->validarTelefono($telefono);
		if (empty($validacionObjetoIdusuario)&&empty($validacionObjetoCedula)&&empty($validacionObjetoCorreo)&&empty($validacionObjetoTelefono)) { */
			//metodo que hara el proceso de AGREGAR
			$this->id=$id;
			$this->idusuario=$idusuario;
			$this->cedula=$cedula;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->telefono=$telefono; 
			$this->correo=$correo;
			$this->foto=$foto;
			$this->foto_url=$foto_url;
			$this->actualizarInsertar($id);
			$this->redireccionarMostrar();
		/* }elseif (!empty($validacionObjetoIdusuario)) {
			echo "este usuario ya existe";
		}elseif (!empty($validacionObjetoCedula)) {
			echo "esta cedula ya existe crack";
		}elseif (!empty($validacionObjetoCorreo)) {
			echo "esta correo ya esta en uso";
		}elseif (!empty($validacionObjetoTelefono)) {
			echo "esta telefono ya esta registrado";
		} */
	}

	//funcion encargarda de ELIMINAR segun su ID
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrar(){
		$adminObjeto=$this->mostrar();
		require '../../view/admin/Administradores.php';
	}

	

	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: AdministradoresController.php?accion=mostrar");
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new AdministradoresController();
	$instanciaControlador->verificarMostrar();
}

//Condicional encargada de AGREGAR y de VALIDAR los tipos de datos que llegan
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " " && $_POST['password'] !="" And $_POST['password'] !=" " && $_POST['password'][0] != " " && $_POST['password2'] !="" And $_POST['password2'] !=" " && $_POST['password2'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {						
					if ($_POST['password'] != $_POST['password2']) {
						echo "las contraseñas no son iguales";
					}else{
						$instanciaControlador=new AdministradoresController();
						$foto=$_FILES['imagen']['name'];
						$fototemporal=$_FILES['imagen']['tmp_name'];
						$foto_url="../../frontend/files/usuarios/" .$foto;
						copy($fototemporal,$foto_url);
						$instanciaControlador->verificarAgregar($_POST['idusuario'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['password'],$foto,$foto_url);
					}					
				}else{
					echo "correo no valido";
				}					
			}else{
				echo "Telefono no valido";
			}
		}else{
			echo "Cedula no valida";
		}
	}else{
		echo "Existen campos en blancos";
	}
}

//Condicional encargada de ELIMINAR segun su ID
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new AdministradoresController();
	$id=$_GET['id'];
	$foto_url=$_GET['foto_url'];
	unlink($foto_url);
	$instanciaControlador->verificarEliminar($id);
}

//Condicional encargada de recoger los datos para ACTUALIZAR 
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new AdministradoresController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

//Condicional encargada de ACTUALIZAR
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {						
					$instanciaControlador=new AdministradoresController();
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
						$foto,
						$foto_url);
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
?>
<?php
require '../../model/public/LoginModel.php';
require 'IniciarController.php';
$instanciaIniciarController= new IniciarController();

class LoginController extends LoginModel {

	/*=======================
	FUNCIONES DEL CONTROLADOR
	========================*/

	//Funcion para cargar la vista
	public function loginView() {
		require '../../view/public/login.php';
	}

	//Funcion para redireccionar al hpme dependiendo de su rol
	public function redireccionSesion() {
		if ($_SESSION['rol']=="administrador") {
			echo $_SESSION['rol'];
		}elseif ($_SESSION['rol']=="empleado") {
			echo $_SESSION['rol'];
		}elseif ($_SESSION['rol']=="cliente") {
			echo $_SESSION['rol'];
		}
	}

	//Funcion que verificar la base de datos para poder logearse
	public function verificarLogin($idusuario,$password) {
		$this->idusuario=$idusuario;
		$this->password=$password;
		$validacionObjetoIdusuario=$this->validarIdusuario($idusuario);
		if (empty($validacionObjetoIdusuario)) {
			  echo "El usuario no existe";
		}else{
			$infoUsuario=$this->buscarUsuarioNombre();
			foreach ($infoUsuario as $usuario) {}
			if (password_verify($password, $usuario->password)) {
				$_SESSION['idusuario']=$usuario->idusuario;
				$_SESSION['foto']=$usuario->foto;
				$_SESSION['foto_url']=$usuario->foto_url;
				$_SESSION['rol']=$usuario->rol;
				$user=$_SESSION['idusuario'];
				$rol=$_SESSION['rol'];	
				$this->RegistroInicio($user,$rol);
				$this->redireccionSesion();
			}else{
				session_destroy();
				echo "Contraseña incorrecta";
			}
		}
	}

	//funcion encargada de llamar al metodo AGREGAR
	public function verificarAgregar($idusuario,$cedula,$nombre,$apellido,$correo,$telefono,$day,$month,$year,$sexo,$password){

		//metodo que hara las VERIFICACION de ciertos campos
		$validacionObjetoIdusuario=$this->validarIdusuario($idusuario);
		$validacionObjetoCedula=$this->validarCedula($cedula);
		$validacionObjetoCorreo=$this->validarCorreo($correo);
		$validacionObjetoTelefono=$this->validarTelefono($telefono);

		if (empty($validacionObjetoIdusuario)&&empty($validacionObjetoCedula)&&empty($validacionObjetoCorreo)&&empty($validacionObjetoTelefono)) {
			//metodo que hara el proceso de AGREGAR
			$this->agregar($idusuario,$cedula,$nombre,$apellido,$correo,$telefono,$day,$month,$year,$sexo,$password);
			echo "completado";
		}elseif (!empty($validacionObjetoIdusuario)) {
			echo "Este usuario ya existe";
		}elseif (!empty($validacionObjetoCedula)) {
			echo "Esta cedula ya existe";
		}elseif (!empty($validacionObjetoCorreo)) {
			echo "Esta correo ya esta en uso";
		}elseif (!empty($validacionObjetoTelefono)) {
			echo "Esta telefono ya esta registrado";
		}
	}

	//Funcion para redireccion de nuevo al login en caso de datos erroneos
	public function redireccionar() {
		header("location: LoginController.php?accion=login");
	}

	public function CerrarSesion($user,$rol) {
		$this->user=$user;
		$this->rol=$rol;
		$this->RegistrarCierre($user,$rol);
		session_destroy();
		$this->redireccionar();
	}
	
}

/*=========================================
CONDICIONALES Y VALIDACION DE TIPO DE DATOS
=========================================*/

//Condicional encargada de cargar la vista
if (isset($_GET['accion']) && $_GET['accion']=='login') {
    $instanciaControlador = new LoginController();
    $instanciaControlador->loginView();
}

//Condicional encargada del inicio de sesion
if (isset($_POST['accion']) && $_POST['accion']=="login") {
	$instanciaControlador= new LoginController();
	$instanciaControlador->verificarLogin($_POST['idusuario'],$_POST['password']);	
}

//Condicional encargada del CIERRE DE SESION
if (isset($_GET['accion']) && $_GET['accion']=="salir") {
	$instanciaControlador= new LoginController();
	$user=$_SESSION['idusuario'];
	$rol=$_SESSION['rol'];
	$instanciaControlador->CerrarSesion($user,$rol);
}

//condicional encargada de recoger los datos de AGREGAR del un nuevo cliente y VALIDAR los tipos de datos que entran
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " " && $_POST['day'] !="" And $_POST['day'] !=" " && $_POST['day'][0] != " " && $_POST['month'] !="" And $_POST['month'] !=" " && $_POST['month'][0] != " " && $_POST['year'] !="" And $_POST['year'] !=" " && $_POST['year'][0] != " " && $_POST['sexo'] !="" And $_POST['sexo'] !=" " && $_POST['sexo'][0] != " " && $_POST['password'] !="" And $_POST['password'] !=" " && $_POST['password'][0] != " " && $_POST['password2'] !="" And $_POST['password2'] !=" " && $_POST['password2'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
					if ($_POST['day']=="0" || $_POST['month']=="0" || $_POST['year']=="0") {
						echo "Ingrese bien su fecha de nacimiento";
					}else{
						if ($_POST['sexo']=="0") {
							echo "Escoge un genero";
						}else{
							if ($_POST['password'] != $_POST['password2']) {
								echo "las contraseñas no son iguales";
							}else{
								$instanciaControlador=new LoginController();
								$instanciaControlador->verificarAgregar($_POST['idusuario'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['telefono'],$_POST['day'],$_POST['month'],$_POST['year'],$_POST['sexo'],$_POST['password']);
							}
						}
					}
				}else{
					echo "Correo no valido";
				}					
			}else{
				echo "Telefono no valido";
			}
		}else{
			echo "Cedula no valida";
		}
	}else{
		echo "Los campos estan vacios";
	}
}
?>
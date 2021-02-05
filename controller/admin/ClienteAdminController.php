<?php 
require '../../model/admin/ClienteAdminModel.php';
require '../public/IniciarController.php';

//condicional encargada de que exista una VARIABLE DE SESION
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

//el objeto CONTROLADOR heredando los del objeto MODELO
class ClienteAdminController extends ClienteAdminModel{

	/*=====================
	Funciones para CLIENTES
	======================*/

	//funcion encargada de carga la VISTA y contenedor del objeto retornado, y de llamar al metodo MOSTRAR
	public function verificarMostrar(){
		$objetoRetornado=$this->mostrar();
		require '../../view/admin/ClienteAdmin.php';
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
			echo "Este cedula ya existe";
		}elseif (!empty($validacionObjetoCorreo)) {
			echo "Este correo ya esta en uso";
		}elseif (!empty($validacionObjetoTelefono)) {
			echo "Este telefono ya esta registrado";
		}
	}

	//funcion encargada de llamar al metodo ELIMINAR
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	//funcionar encargada de llamar a la vista de EDITAR y llamar al metodo ACTUALIZAR(de select) y su objeto
	public function verificarActualizar($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/EditarCliente.php';
	}
	
	//funcionar encargada de llamar al metodo ACTUALIZARINSERTAR
	public function verificarActualizarInsertar($id,$idusuario,$cedula,$nombre,$apellido,$correo,$telefono,$day,$month,$year,$sexo) {
		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->correo=$correo;
		$this->telefono=$telefono;
		$this->day=$day;
		$this->month=$month;
		$this->year=$year;
		$this->sexo=$sexo;
		$this->actualizarInsertar($id);
		$this->redireccionarMostrar();
		
	}
	
	//funcion encargada de redigirlo a este URL despues de terminar el C R U D
	public function redireccionarMostrar(){
		header("location: ClienteAdminController.php?accion=mostrar");
	}
}

/*=======================
Condicionales de CLIENTES
========================*/
	
//condicional encargada de MOSTRAR todos los cliente del sistema
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new ClienteAdminController();
	$instanciaControlador->verificarMostrar();
}

//condicional encargada de recoger los datos de AGREGAR del un nuevo cliente
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
								$instanciaControlador=new ClienteAdminController();
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
		echo "Existen campos en blanco";
	}
}

//condicional encargada de recibir el id para ELIMINAR
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new ClienteAdminController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

//condicional encargada de mandar el id para imprimirlo en su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new ClienteAdminController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

//condicional encargada de recoger los datos para hacer el proceso de ACTUALIZACION del cliente 
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new ClienteAdminController();
	$instanciaControlador->verificarActualizarInsertar($_POST['id'],$_POST['idusuario'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['telefono'],$_POST['day'],$_POST['month'],$_POST['year'],$_POST['sexo']);
}
?>
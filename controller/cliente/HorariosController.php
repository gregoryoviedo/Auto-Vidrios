<?php 
require '../../model/cliente/HorariosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class HorariosController extends HorariosModel{

	public function verificarAgregar($idusuario,$servicio,$fecha,$hora,$empleado){

		$validacionServicio=$this->validarServicio($servicio);
		$validacionFecha=$this->validarFecha($fecha);
		$validacionHora=$this->validarHora($hora);
		$validacionEmpleado=$this->validarEmpleado($empleado);
		if (!empty($validacionServicio)&&!empty($validacionFecha)&&!empty($validacionHora)&&!empty($validacionEmpleado)) {
			echo "ya esta apartada esta cita, coloca datos diferentes";
		}else{
			$this->agregar($idusuario,$servicio,$fecha,$hora,$empleado);
			echo "completado";
		}
		
	}
	
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	public function verificarMostrar($user){
		$empleadoObjeto=$this->mostrarEmpleado();
		$this->user=$user;
		$citaObjeto=$this->mostrarCita();
		require '../../view/cliente/Horarios.php';
	}

	public function redireccionarMostrar(){
		header("location: HorariosController.php?accion=mostrar");
	}
}

//condicional encargada de tomar los datos del formulario de AGREGAR
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if ($_POST['servicio'] !="" And $_POST['servicio'] !=" " && $_POST['servicio'][0] != " " && $_POST['fecha'] !="" And $_POST['fecha'] !=" " && $_POST['fecha'][0] != " " && $_POST['hora'] !="" And $_POST['hora'] !=" " && $_POST['hora'][0] != " " && $_POST['empleado'] !="" And $_POST['empleado'] !=" " && $_POST['empleado'][0] != " "){
		if ($_POST['servicio']=="0" OR $_POST['hora']=="0" OR $_POST['empleado']=="0") {
			echo "Datos invalidos";
		}else{
			$instanciaControlador=new HorariosController();
			$idusuario=$_SESSION['idusuario'];
			$servicio=$_POST['servicio'];
			$fecha=$_POST['fecha'];
			$hora=$_POST['hora'];
			$empleado=$_POST['empleado'];
			$instanciaControlador->verificarAgregar($idusuario,$servicio,$fecha,$hora,$empleado);
		}
	}else{
		echo "Existen campos incompletos";
	}
}

//condicional encargada de MOSTRAR los nombres de los trabajores y de la cita hecha
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new HorariosController();
	$user=$_SESSION['idusuario'];
	$instanciaControlador->verificarMostrar($user);
}

//condicional encargada de ELIMINAR la cita del cliente
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new HorariosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

?>
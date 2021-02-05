<?php 
require '../../model/admin/IngresosModel.php';
require '../public/IniciarController.php';

//condicional encargada de que exista una VARIABLE DE SESION
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

//el objeto CONTROLADOR heredando los del objeto MODELO
class IngresosController extends IngresosModel{

	/*=====================
	Funciones para CLIENTES
	======================*/

	//funcion encargada de carga la VISTA y contenedor del objeto retornado, y de llamar al metodo MOSTRAR
	public function verificarMostrar(){
        $objetoRetornado=$this->mostrar();
        $objetoEmpleado=$this->traerEmpleado();
        $objetoServicio=$this->traerServicio();
		require '../../view/admin/Ingresos.php';
	}

	//funcion encargada de llamar al metodo AGREGAR 
	public function verificarAgregar($idusuario,$empleado,$servicio,$descripcion,$cliente,$monto){

        $this->agregar($idusuario,$empleado,$servicio,$descripcion,$cliente,$monto);
        $this->redireccionarMostrar();
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
		$objetoEmpleado=$this->traerEmpleado();
        $objetoServicio=$this->traerServicio();
		require '../../View/admin/EditarIngreso.php';
	}
	
	//funcionar encargada de llamar al metodo ACTUALIZARINSERTAR
	public function verificarActualizarInsertar($id,$idusuario,$empleado,$servicio,$descripcion,$cliente,$monto) {


		
		

		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->empleado=$empleado;
		$this->servicio=$servicio;
		$this->descripcion=$descripcion;
		$this->cliente=$cliente;
		$this->monto=$monto;
		$this->actualizarInsertar($id);
		$this->redireccionarMostrar();
	}

	//funcionar encargada de llamar a la vista de EDITAR y llamar al metodo ACTUALIZAR(de select) y su objeto
	public function verificarVer($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/VerIngreso.php';
	}
	
	//funcion encargada de redigirlo a este URL despues de terminar el C R U D
	public function redireccionarMostrar(){
		header("location: IngresosController.php?accion=mostrar");
	}
}

/*=======================
Condicionales de CLIENTES
========================*/
	
//condicional encargada de MOSTRAR todos los cliente del sistema
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new IngresosController();
	$instanciaControlador->verificarMostrar();
}

//condicional encargada de recoger los datos de AGREGAR del un nuevo cliente
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
    $instanciaControlador=new IngresosController();
    $idusuario=$_SESSION['idusuario'];
    $empleado=$_POST['empleado'];
    $servicio=$_POST['servicio'];
    $descripcion=$_POST['descripcion'];
    $monto=$_POST['monto'];
    $cliente=$_POST['cliente'];

   /*  echo $idusuario;
    echo "<br>";
    echo $empleado;
    echo "<br>";
    echo $servicio;
    echo "<br>";
    echo $descripcion;
	echo "<br>";
	echo $cliente;
    echo "<br>";
    echo $monto;
    echo "<br>"; */

    $instanciaControlador->verificarAgregar($idusuario,$empleado,$servicio,$descripcion,$cliente,$monto);
}

//condicional encargada de recibir el id para ELIMINAR
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new IngresosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarEliminar($id);
}

//condicional encargada de mandar el id para imprimirlo en su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new IngresosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}



//condicional encargada de mandar el id para imprimirlo en su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="ver") {
	$instanciaControlador=new IngresosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarVer($id);
}

//condicional encargada de recoger los datos para hacer el proceso de ACTUALIZACION del cliente 
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new IngresosController();
	$id=$_POST['id'];
	$idusuario=$_SESSION['idusuario'];
	$instanciaControlador->verificarActualizarInsertar($id,$idusuario,$_POST['empleado'],$_POST['servicio'],$_POST['descripcion'],$_POST['cliente'],$_POST['monto']);
}
?>
<?php 
require '../../model/admin/EgresosModel.php';
require '../public/IniciarController.php';
//condicional encargada de que exista una VARIABLE DE SESION
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

//el objeto CONTROLADOR heredando los del objeto MODELO
class EgresosController extends EgresosModel{

	/*=====================
	Funciones para EGRESOS
	======================*/

	//funcion encargada de carga la VISTA y contenedor del objeto retornado, y de llamar al metodo MOSTRAR
	public function verificarMostrar(){
		$objetoMaterial=$this->mostrarMaterial();
        $objetoRetornado=$this->mostrar();
		require '../../view/admin/Egresos.php';
	}

	//funcion encargada de llamar al metodo AGREGAR 
	public function verificarAgregar($idusuario,$material,$cantidad,$id,$gastado,$cantidad_original){

		$this->agregar($idusuario,$material,$cantidad,$id,$cantidad_original);
		$this->id=$id;
		$this->gastado=$gastado;
		$this->restarStock($id,$gastado);
        $this->redireccionarMostrar();
	}

	//funcion encargada de llamar al metodo ELIMINAR
	public function verificarEliminar($id,$renovado,$id_material) {
		$this->id=$id;
		$this->eliminar();
		$this->renovado=$renovado;
		$this->id_material=$id_material;
		$this->restaurarStock($renovado,$id_material);
		$this->redireccionarMostrar();
	}

	//funcionar encargada de llamar a la vista de EDITAR y llamar al metodo ACTUALIZAR(de select) y su objeto
	public function verificarActualizar($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/EditarEgresos.php';
	}
	
	public function verificarHacer($id) {
		$this->id=$id;
		$objetoRetornado=$this->verMaterial($id);
		require '../../View/admin/HacerEgreso.php';
	} 

	//funcionar encargada de llamar al metodo ACTUALIZARINSERTAR para RESTAR stock
	public function verificarActualizarInsertarDevolverStock($id,$idusuario,$cantidad,$resultado,$id_material) {
		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->cantidad=$cantidad;
		$this->resultado=$resultado;
		$this->id_material=$id_material;
		$this->actualizarInsertar($id);
		$this->DevolverStock($id_material,$resultado);
		$this->redireccionarMostrar();
	}

	//funcionar encargada de llamar al metodo ACTUALIZARINSERTAR para SUMAR stock
	public function verificarActualizarInsertarSumarStock($id,$idusuario,$cantidad,$resultado,$id_material) {
		$this->id=$id;
		$this->idusuario=$idusuario;
		$this->cantidad=$cantidad;
		$this->resultado=$resultado;
		$this->id_material=$id_material;
		$this->actualizarInsertar($id);
		$this->SumarStock($id_material,$resultado);
		$this->redireccionarMostrar();
	}

	//funcion encargada de redigirlo a este URL despues de terminar el C R U D
	public function redireccionarMostrar(){
		header("location: EgresosController.php?accion=mostrar");
	}
}

/*=======================
Condicionales de EGRESOS
========================*/
	
//condicional encargada de MOSTRAR todos los EGRESOS del sistema
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new EgresosController();
	$instanciaControlador->verificarMostrar();
}

//condicional encargada de recoger los datos de AGREGAR del un nuevo EGRESO
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
    $instanciaControlador=new EgresosController();
    $idusuario=$_SESSION['idusuario'];
    $material=$_POST['material'];
	$cantidad=$_POST['cantidad'];
	$cantidad_original=$_POST['cantidad_original'];
	$id=$_POST['id'];
	$gastado=$cantidad_original-$cantidad;
    $instanciaControlador->verificarAgregar($idusuario,$material,$cantidad,$id,$gastado,$cantidad_original);
}

//condicional encargada de recibir el id para ELIMINAR
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new EgresosController();
	$id=$_GET['id'];
	$id_material=$_GET['id_material'];
	$cantidad=$_GET['cantidad'];
	$cantidad_original=$_GET['cantidad_original'];
	$renovado=$cantidad_original+$cantidad;
	$instanciaControlador->verificarEliminar($id,$renovado,$id_material);
}

//condicional encargada de mandar el id para imprimirlo en su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new EgresosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

//condicional encargada de mandar el id para imprimirlo en su respectiva vista
if (isset($_GET['accion']) && $_GET['accion']=="hacer") {
	$instanciaControlador=new EgresosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarHacer($id);
}

//condicional encargada de recoger los datos para hacer el proceso de ACTUALIZACION del EGRESO y validacion 
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador=new EgresosController();
	$id=$_POST['id'];
	$idusuario=$_SESSION['idusuario'];
	$cantidad=$_POST['cantidad'];
	$cantidad_actual=$_POST['cantidad_actual'];
	$cantidad_original=$_POST['cantidad_original'];
	$id_material=$_POST['id_material'];

	if ($cantidad > $cantidad_original) {
		echo "se paso";
	}else{
		if ($cantidad >= $cantidad_actual ) {
			$resultado=$cantidad_original-$cantidad;
			$instanciaControlador->verificarActualizarInsertarSumarStock($id,$idusuario,$cantidad,$resultado,$id_material);
		}elseif ($cantidad <= $cantidad_actual) {
			$resultado=$cantidad_original+$cantidad;
			$instanciaControlador->verificarActualizarInsertarDevolverStock($id,$idusuario,$cantidad,$resultado,$id_material);
		}
	}
}
?>
<?php 
require '../../model/public/ContactanosModel.php';

class ContactanosController extends ContactanosModel {

	//Funcion para agregar el mensaje de contactanos
	public function verificarAgregar($nombre,$correo,$asunto,$mensaje){
		$this->agregar($nombre,$correo,$asunto,$mensaje);
		echo "completado";
	}

	public function reddireccionar(){
		header('location: ContactanosController.php?accion=mostrar');
	}

	//Funcion que trae la vista
	public function mostrar() {
		require '../../view/public/ContactanosPublic.php';
	}

}

//condicional encargarda de agarrar los datos de CONTACTANOS para AGREGAR
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if($_POST['nombre'] !="" && $_POST['nombre'][0] != " " && $_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['asunto'] !="" && $_POST['asunto'][0] != " " && $_POST['mensaje'] !="" && $_POST['mensaje'][0] != " " ) {
		if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
			$instanciaControlador=new ContactanosController();
			$instanciaControlador->verificarAgregar($_POST['nombre'],$_POST['correo'],$_POST['asunto'],$_POST['mensaje']);
		}else{
			echo "correo no valido";
		}					
	}else{
		echo "Existen campos en blanco";
	}
}

//Condicional para traer la vista
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new ContactanosController();
	$instanciaControlador->mostrar();
}

?>
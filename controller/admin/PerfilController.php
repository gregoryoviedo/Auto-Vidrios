<?php 
require '../../model/admin/PerfilModel.php';
require '../public/IniciarController.php';

$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PerfliController extends PerfilModel{

public function verificarMostrar($user) {
	$this->user=$user;
	$objetoRetornado=$this->mostrarPerfil();
	require '../../view/admin/Perfil.php';
}

//Funcion encargada de TRAER los datos para posteriormente actualizar
public function verificarActualizar($id) {
	$this->id=$id;
	$objetoRetornado=$this->actualizar();
	require '../../View/admin/EditarPerfil.php';
}

//Funcion encargada de ACTUALIZAR segun el ID que llego
public function verificarActualizarInsertar($id,$idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$foto,$foto_url) {

/* 	 echo $id;
	 echo "<br>";
	  echo $idusuario;
	  echo "<br>";
	  echo $cedula;
	  echo "<br>";
	  echo $nombre;
	  echo "<br>";
	  echo $apellido;
	  echo "<br>";
	  echo $telefono;
	  echo "<br>";
	  echo $correo;
	  echo "<br>";
	  echo $foto;
	  echo "<br>";
	 echo $foto_url;
	 echo "<br>";
 */



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

}


//Funcion de redireccionar para recargar la pagina
public function redireccionarMostrar(){
	header("location: PerfilController.php?accion=viewperfil");
}

}

if (isset($_GET['accion']) && $_GET['accion']=="viewperfil") {
	$instanciaController=new PerfliController();
	$user=$_SESSION['idusuario'];
	$instanciaController->verificarMostrar($user);
}

//Condicional encargada de recoger los datos para ACTUALIZAR 
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new PerfliController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

//Condicional encargada de ACTUALIZAR
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	if($_POST['idusuario'] !="" And $_POST['idusuario'] !=" " && $_POST['idusuario'][0] != " " && $_POST['cedula'] !="" And $_POST['cedula'] !=" " && $_POST['cedula'][0] != " " && $_POST['nombre'] !=""  && $_POST['nombre'][0] != " " && $_POST['apellido'] !="" && $_POST['apellido'][0] != " " &&$_POST['correo'] !="" And $_POST['correo'] !=" " && $_POST['correo'][0] != " " && $_POST['telefono'] !="" And $_POST['telefono'] !=" " && $_POST['telefono'][0] != " ") {
		if (is_numeric($_POST['cedula'])) {
			if (is_numeric($_POST['telefono'])) {
				if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {						
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
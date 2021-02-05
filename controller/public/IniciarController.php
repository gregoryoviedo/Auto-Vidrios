<?php 

class IniciarController{
	public function __construct(){
		session_start();
	}

	public function redireccionarBloqueo() {
		header("location: http://localhost/AutoVidrios/Controller/public/LoginController.php?accion=login");
	}
	
}

?>
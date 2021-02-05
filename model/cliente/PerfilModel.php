<?php 
require '../../config/conexion.php';


class PerfilModel{


	protected $id;
	protected $idusuario;
	protected $cedula;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $password;
	protected $foto;
	protected $foto_url;


	protected function mostrarPerfil() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM clientes WHERE idusuario='$this->user'");
		$datosPerfil->execute();
		$objetoRetornado=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornado;
	}

	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM clientes WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizarObjeto;
	}

	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE clientes SET idusuario='$this->idusuario', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', telefono='$this->telefono', foto='$this->foto', foto_url='$this->foto_url' WHERE id='$this->id'");
		$actualizacion->execute();
	}











	protected function buscarPassword() {
		$instanciarConexion=new Conexion();
		$actual=$instanciarConexion->db->prepare("SELECT idusuario,password FROM usuarios WHERE idusuario='$this->user'");
		$actual->execute();
		$VerificarPassword=$actual->fetchAll(PDO::FETCH_OBJ);
		return $VerificarPassword;
	}

	protected function nuevaPassword() {
		$instanciarConexion=new Conexion();
		$cambio=$instanciarConexion->db->prepare("UPDATE usuarios SET password='$this->nueva' WHERE id='$this->id'");
		$cambio->execute();
	}
	
}


?>
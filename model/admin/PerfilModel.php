<?php 
require '../../config/conexion.php';


class PerfilModel{


	public $id;
	public $idusuario;
	public $cedula;
	public $nombre;
	public $apellido;
	public $telefono;
	public $correo;
	public $foto;
	public $foto_url;


	public function mostrarPerfil() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM administradores WHERE idusuario='$this->user'");
		$datosPerfil->execute();
		$objetoRetornado=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornado;
	}
	
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM administradores WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizarObjeto;
	}

	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE administradores SET idusuario='$this->idusuario', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', telefono='$this->telefono', correo='$this->correo', foto='$this->foto', foto_url='$this->foto_url' WHERE id='$this->id'");
		$actualizacion->execute();
	}


	
}


?>
<?php
require '../../config/conexion.php';

class OperadorModel{

	public $id;
	public $idusuario;
	public $cedula;
	public $nombre;
	public $apellido;
	public $telefono;
	public $rif;
	public $rol;
	public $password;
	public $foto;
	public $foto_url;
	
	public function __construct(){
		
	}

	public function agregar($idusuario,$cedula,$nombre,$apellido,$telefono,$rif,$password,$foto,$foto_url){
		
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->telefono=$telefono;
		$this->rif=$rif;
		$this->rol="operador";
		$this->password=$password;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		

		$instanciarConexion=new Conexion();
		$newPassword=password_hash($this->password, PASSWORD_ARGON2I);
		$insertar=$instanciarConexion->db->prepare("INSERT INTO cargos(idusuario,cedula,nombre,apellido,telefono,rif,rol,password,foto,foto_url) VALUES (?, ?, ?, ?, ?, ?, ?, '$newPassword', ?, ?)");
		$insertar->bindParam(1,$this->idusuario);
		$insertar->bindParam(2,$this->cedula);
		$insertar->bindParam(3,$this->nombre);
		$insertar->bindParam(4,$this->apellido);
		$insertar->bindParam(5,$this->telefono);
		$insertar->bindParam(6,$this->rif);
		$insertar->bindParam(7,$this->rol);
		$insertar->bindParam(8,$this->foto);
		$insertar->bindParam(9,$this->foto_url);
		$insertar->execute();
	}

	public function mostrar(){
		$instanciarConexion=new Conexion();
		$datosoperador=$instanciarConexion->db->prepare("SELECT * FROM cargos WHERE rol='operador'");
		$datosoperador->execute();
		$operadorObjeto=$datosoperador->fetchAll(PDO::FETCH_OBJ);
		return $operadorObjeto;
	}

	public function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM cargos WHERE id='$this->id'");
		$delete->execute();
	}
	
	public function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM usuarios WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizarObjeto;
	}

	public function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE usuarios SET idusuario='$this->idusuario', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', correo='$this->correo', telefono='$this->telefono' WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>
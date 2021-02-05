<?php
require '../../config/conexion.php';

class EmpleadosModel{

	public $id;
	public $idusuario;
	public $cedula;
	public $nombre;
	public $apellido;
	public $telefono;
	public $correo;
	public $rif;
	public $rol;
	public $password;
	public $foto;
	public $foto_url;

	public function agregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$rif,$password,$foto,$foto_url){
		
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->telefono=$telefono;
		$this->correo=$correo;
		$this->rif=$rif;
		$this->rol="empleado";
		$this->password=$password;
		$this->foto=$foto;
		$this->foto_url=$foto_url;

		$instanciarConexion=new Conexion();
		$newPassword=password_hash($this->password, PASSWORD_DEFAULT);
		$insertar=$instanciarConexion->db->prepare("INSERT INTO empleados(idusuario,cedula,nombre,apellido,telefono,correo,rif,rol,password,foto,foto_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '$newPassword', ?, ?)");
		$insertar->bindParam(1,$this->idusuario);
		$insertar->bindParam(2,$this->cedula);
		$insertar->bindParam(3,$this->nombre);
		$insertar->bindParam(4,$this->apellido);
		$insertar->bindParam(5,$this->telefono);
		$insertar->bindParam(6,$this->correo);
		$insertar->bindParam(7,$this->rif);
		$insertar->bindParam(8,$this->rol);
		$insertar->bindParam(9,$this->foto);
		$insertar->bindParam(10,$this->foto_url);
		$insertar->execute();
	}

	public function mostrar(){
		$instanciarConexion=new Conexion();
		$datosempleado=$instanciarConexion->db->prepare("SELECT * FROM empleados WHERE rol='empleado'");
		$datosempleado->execute();
		$empleadoObjeto=$datosempleado->fetchAll(PDO::FETCH_OBJ);
		return $empleadoObjeto;
	}

	public function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM empleados WHERE id='$this->id'");
		$delete->execute();
	}
	
	public function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM empleados WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizarObjeto;
	}

	public function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE empleados SET idusuario='$this->idusuario', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', telefono='$this->telefono', correo='$this->correo', rif='$this->rif', foto='$this->foto', foto_url='$this->foto_url'  WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>
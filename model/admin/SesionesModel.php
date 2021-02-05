<?php 
require '../../config/conexion.php';

class SesionesModel{

	protected $id;
	protected $idusuario;
	protected $estado;
	protected $inicio;

	protected function mostrarClientes() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM login WHERE rol='cliente' ORDER BY rol DESC");
		$datosPerfil->execute();
		$objetoRetornadoCliente=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoCliente;
    }
    
    protected function mostrarAdministradores() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM login WHERE rol='administrador' ORDER BY rol DESC");
		$datosPerfil->execute();
		$objetoRetornadoAdministrador=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoAdministrador;
    }
    
    protected function mostrarEmpleado() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM login WHERE rol='empleado' ORDER BY rol DESC");
		$datosPerfil->execute();
		$objetoRetornadoEmpleado=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoEmpleado;
	}
}
?>
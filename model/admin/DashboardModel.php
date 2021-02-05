<?php 
require '../../config/conexion.php';

class DashboardModel {
	
	protected function Clientes(){
		$instanciarConexion=new Conexion();
		$Clientes=$instanciarConexion->db->prepare("SELECT count(*) AS id FROM clientes");
		$Clientes->execute();
		$NumClientes=$Clientes->fetchAll(PDO::FETCH_OBJ);
		return $NumClientes;
	}

	protected function Administradores(){
		$instanciarConexion=new Conexion();
		$Administradores=$instanciarConexion->db->prepare("SELECT count(*) AS id FROM administradores");
		$Administradores->execute();
		$NumAdministradores=$Administradores->fetchAll(PDO::FETCH_OBJ);
		return $NumAdministradores;
	}

	protected function Empleados(){
		$instanciarConexion=new Conexion();
		$Empleados=$instanciarConexion->db->prepare("SELECT count(*) AS id FROM empleados");
		$Empleados->execute();
		$NumEmpleados=$Empleados->fetchAll(PDO::FETCH_OBJ);
		return $NumEmpleados;
	}

	protected function Contactanos(){
		$instanciarConexion=new Conexion();
		$Contactanos=$instanciarConexion->db->prepare("SELECT count(*) AS id FROM contactanos");
		$Contactanos->execute();
		$NumContactanos=$Contactanos->fetchAll(PDO::FETCH_OBJ);
		return $NumContactanos;
	}
}
?>
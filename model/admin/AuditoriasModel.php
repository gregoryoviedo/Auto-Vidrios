<?php 
require '../../config/conexion.php';

class AuditoriasModel{

	protected $id;
	protected $idusuario;
	protected $estado;
	protected $inicio;

	protected function mostrarClientes() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_clientes ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadoCliente=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoCliente;
    }
    
    protected function mostrarAdministrador() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_administrador ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadoAdministradores=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoAdministradores;
	}
	
	protected function mostrarEmpleado() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_empleados ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadoEmpleado=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoEmpleado;
	}
    
    protected function mostrarCatalogo() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_catalogo ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadocatalogo=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadocatalogo;
	}

	protected function mostrarEconomia() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_economia ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadoEconomia=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoEconomia;
	}

	protected function mostrarAtencion() {
		$instanciarConexion=new Conexion();
		$datosPerfil=$instanciarConexion->db->prepare("SELECT * FROM auditorias_atencion ORDER BY id DESC");
		$datosPerfil->execute();
		$objetoRetornadoAtencion=$datosPerfil->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornadoAtencion;
	}
}
?>
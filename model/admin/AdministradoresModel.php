<?php
require '../../config/conexion.php';

class AdministradoresModel{

	protected $id;
	protected $idusuario;
	protected $cedula;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $correo;
	protected $rol;
	protected $password;
	protected $foto;
	protected $foto_url;
	
	protected function validarIdusuario($idusuario) {
        $instanciarConexion=new Conexion();
        $this->idusuario=$idusuario;
        $resultados=$instanciarConexion->db->prepare("SELECT idusuario FROM clientes WHERE idusuario='$this->idusuario' UNION ALL SELECT idusuario FROM administradores WHERE idusuario='$this->idusuario' UNION ALL SELECT idusuario FROM enpleados WHERE idusuario='$this->idusuario'");
        $resultados->execute();
        $validacionObjetoIdusuario=$resultados->fetchAll(PDO::FETCH_OBJ);   //metodo para transformarlo en objeto
        return $validacionObjetoIdusuario;
    }

    //consulta sql de la valicacion de la CEDULA
    protected function validarCedula($cedula) {
        $instanciarConexion=new Conexion();
        $this->cedula=$cedula;
        $resultados=$instanciarConexion->db->prepare("SELECT cedula FROM clientes WHERE cedula='$this->cedula' UNION ALL SELECT cedula FROM administradores WHERE cedula='$this->cedula' UNION ALL SELECT cedula FROM enpleados WHERE cedula='$this->cedula'");
        $resultados->execute();
        $validacionObjetoCedula=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoCedula;
    }

    //consulta sql de la valicacion del CORREO
    protected function validarCorreo($correo) {
        $instanciarConexion=new Conexion();
        $this->correo=$correo;
        $resultados=$instanciarConexion->db->prepare("SELECT correo FROM clientes WHERE correo='$this->correo' UNION ALL SELECT correo FROM administradores WHERE correo='$this->correo' UNION ALL SELECT correo FROM enpleados WHERE correo='$this->correo'");
        $resultados->execute();
        $validacionObjetoCorreo=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoCorreo;
    }

    //consulta sql de la valicacion del TELEFONO
    protected function validarTelefono($telefono) {
        $instanciarConexion=new Conexion();
        $this->telefono=$telefono;
        $resultados=$instanciarConexion->db->prepare("SELECT telefono FROM clientes WHERE telefono='$this->telefono' UNION ALL SELECT telefono FROM administradores WHERE telefono='$this->telefono' UNION ALL SELECT telefono FROM enpleados WHERE telefono='$this->telefono'");
        $resultados->execute();
        $validacionObjetoTelefono=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoTelefono;
    }

	protected function agregar($idusuario,$cedula,$nombre,$apellido,$telefono,$correo,$password,$foto,$foto_url){
		
		$this->idusuario=$idusuario;
		$this->cedula=$cedula;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->telefono=$telefono;
		$this->correo=$correo;
		$this->rol="administrador";
		$this->password=$password;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		
		$instanciarConexion=new Conexion();
		$newPassword=password_hash($this->password, PASSWORD_DEFAULT);
		$insertar=$instanciarConexion->db->prepare("INSERT INTO administradores (idusuario,cedula,nombre,apellido,telefono,correo,rol,password,foto,foto_url) VALUES (?, ?, ?, ?, ?, ?, ?, '$newPassword', ?, ?)");
		$insertar->bindParam(1,$this->idusuario);
		$insertar->bindParam(2,$this->cedula);
		$insertar->bindParam(3,$this->nombre);
		$insertar->bindParam(4,$this->apellido);
		$insertar->bindParam(5,$this->telefono);
		$insertar->bindParam(6,$this->correo);
		$insertar->bindParam(7,$this->rol);
		$insertar->bindParam(8,$this->foto);
		$insertar->bindParam(9,$this->foto_url);
		$insertar->execute();
	}

	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$datosAdmin=$instanciarConexion->db->prepare("SELECT id,idusuario,cedula,nombre,apellido,telefono,correo,creacion,foto,foto_url FROM administradores WHERE rol='administrador'");
		$datosAdmin->execute();
		$adminObjeto=$datosAdmin->fetchAll(PDO::FETCH_OBJ);
		return $adminObjeto;
	}

	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM administradores WHERE id='$this->id'");
		$delete->execute();
	}
	
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT id,idusuario,cedula,nombre,apellido,telefono,correo,foto,foto_url FROM administradores WHERE id='$this->id'");
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
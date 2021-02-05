<?php
require '../../config/conexion.php';
class ClienteAdminModel{

	protected $id;
	protected $idusuario;
	protected $cedula;
	protected $nombre;
	protected $apellido;
	protected $correo;
	protected $telefono;
	protected $fecha;
	protected $sexo;
	protected $password;
	protected $rol;
	
	 //consulta sql de la valicacion del IDUSUARIO
	 protected function validarIdusuario($idusuario) {
        $instanciarConexion=new Conexion();
        $this->idusuario=$idusuario;
        $resultados=$instanciarConexion->db->prepare("SELECT idusuario FROM clientes WHERE idusuario='$idusuario' UNION ALL SELECT idusuario FROM administradores WHERE idusuario='$this->idusuario' UNION ALL SELECT idusuario FROM empleados WHERE idusuario='$this->idusuario'");
        $resultados->execute();
        $validacionObjetoIdusuario=$resultados->fetchAll(PDO::FETCH_OBJ);   //metodo para transformarlo en objeto
        return $validacionObjetoIdusuario;
    }

    //consulta sql de la valicacion de la CEDULA
    protected function validarCedula($cedula) {
        $instanciarConexion=new Conexion();
        $this->cedula=$cedula;
        $resultados=$instanciarConexion->db->prepare("SELECT cedula FROM clientes WHERE cedula='$this->cedula' UNION ALL SELECT cedula FROM administradores WHERE cedula='$this->cedula' UNION ALL SELECT cedula FROM empleados WHERE cedula='$this->cedula'");
        $resultados->execute();
        $validacionObjetoCedula=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoCedula;
    }

    //consulta sql de la valicacion del CORREO
    protected function validarCorreo($correo) {
        $instanciarConexion=new Conexion();
        $this->correo=$correo;
        $resultados=$instanciarConexion->db->prepare("SELECT correo FROM clientes WHERE correo='$this->correo' UNION ALL SELECT correo FROM administradores WHERE correo='$this->correo' UNION ALL SELECT correo FROM empleados WHERE correo='$this->correo'");
        $resultados->execute();
        $validacionObjetoCorreo=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoCorreo;
    }

    //consulta sql de la valicacion del TELEFONO
    protected function validarTelefono($telefono) {
        $instanciarConexion=new Conexion();
        $this->telefono=$telefono;
        $resultados=$instanciarConexion->db->prepare("SELECT telefono FROM clientes WHERE telefono='$this->telefono' UNION ALL SELECT telefono FROM administradores WHERE telefono='$this->telefono' UNION ALL SELECT telefono FROM empleados WHERE telefono='$this->telefono'");
        $resultados->execute();
        $validacionObjetoTelefono=$resultados->fetchAll(PDO::FETCH_OBJ);
        return $validacionObjetoTelefono;
    }

	//funcion para MOSTRAR todos los cliente del sistema
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT * FROM clientes WHERE rol='cliente'");
		$datosUsuario->execute();
		$usuarioObjeto=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $usuarioObjeto;
	}

	//funcion para INSERTAR un nuevo cliente al sistema
	protected function agregar($idusuario,$cedula,$nombre,$apellido,$correo,$telefono,$day,$month,$year,$sexo,$password){

		//asignacion de propiedades a una variable
        $instanciarConexion=new Conexion();
        $this->idusuario=$idusuario;
        $this->cedula=$cedula;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->day=$day;
        $this->month=$month;
        $this->year=$year;
        $this->sexo=$sexo;
        $this->password=$password;
        $this->rol="cliente";
        $this->foto="FotoDefault.jpg"; 	//Foto por defecto al registrarse
        $this->foto_url='../../frontend/img/iconos/FotoDefault.jpg'; 	//url por defecto de la foto

        $newPassword=password_hash($this->password, PASSWORD_DEFAULT); 	//encriptacion de las contraseñas
        $insertar=$instanciarConexion->db->prepare("INSERT INTO clientes(idusuario,cedula,nombre,apellido,correo,telefono,day,month,year,sexo,password,rol,foto,foto_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$newPassword', ?, ?, ?)");
        $insertar->bindParam(1,$this->idusuario);
        $insertar->bindParam(2,$this->cedula);
        $insertar->bindParam(3,$this->nombre);
        $insertar->bindParam(4,$this->apellido);
        $insertar->bindParam(5,$this->correo);
        $insertar->bindParam(6,$this->telefono);
        $insertar->bindParam(7,$this->day);
        $insertar->bindParam(8,$this->month);
        $insertar->bindParam(9,$this->year);
        $insertar->bindParam(10,$this->sexo);
        $insertar->bindParam(11,$this->rol);
        $insertar->bindParam(12,$this->foto);
        $insertar->bindParam(13,$this->foto_url);
        $insertar->execute();
    }    

	//funcion para ELIMINAR algun cliente segun su id
	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM clientes WHERE id='$this->id'");
		$delete->execute();
	}

	//funcion para SELECCIONAR los datos del cliente por su id
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM clientes WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $actualizarObjeto;
	}

	//funciona para ACTUALIZAR los datos del cliente segun su id
	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE clientes SET idusuario='$this->idusuario', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', correo='$this->correo', telefono='$this->telefono', day='$this->day', month='$this->month', year='$this->year', sexo='$this->sexo' WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>
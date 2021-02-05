<?php 
require '../../config/conexion.php';

class ContactanosModel {
	
	protected $id;
	protected $nombre;
	protected $correo;
	protected $asunto;
	protected $mensaje;

    //Funcion del modelo que INSERTA en la base de datos
    protected function agregar($nombre,$correo,$asunto,$mensaje){
        $instanciarConexion=new Conexion();
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->asunto=$asunto;
        $this->mensaje=$mensaje;
        $insertar=$instanciarConexion->db->prepare("INSERT INTO contactanos(nombre,correo,asunto,mensaje) VALUES (?, ?, ?, ?)");
        $insertar->bindParam(1,$this->nombre);
        $insertar->bindParam(2,$this->correo);
        $insertar->bindParam(3,$this->asunto);
        $insertar->bindParam(4,$this->mensaje);
        $insertar->execute();
    }
}
?>
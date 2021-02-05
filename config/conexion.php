<?php
class Conexion{
    public $db;

     public function __construct() {
        //Datos que me permiten ingresar la informacion a mi instancia PDO
        $host = "localhost";
        $dbname = "auto_vidrios";
        $username = "root";
        $password = "";
        
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        } catch (PDOException $th) {
            echo "Error: ". $th->getMessage();
        }
    }

    //Funcion que me permite cerrar una conexion cuando yo quiera
    public function CerrarConexion() {
        $this->db = null;
    }
}
?>
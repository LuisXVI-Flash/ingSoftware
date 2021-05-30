<?php
include("conexion.php");
class Dispositivo extends Conexion{
	private $id;
	private $pac;
	private $estado; 


	public function __construct($id_,$pac_,$estado_){
		$this->id=$id_;
		$this->pac=$pac_;
		$this->estado=$estado_;
	}

	public function agregar(){
		$sql="INSERT INTO `producto`(`id`, `pac`, `estado`) VALUES ('{$this->id}','{$this->pac}','{$this->estado}')";
		$conec=$this->obtenerConexion();
		$conec->query($sql);
	}


}
?>
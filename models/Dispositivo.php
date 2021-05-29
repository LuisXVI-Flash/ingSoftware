<?php
require("models/conexion.php");
class Dispositivo{
	private $id;
	private $pac;
	private $estado; 


	public function __construct($id_,$pac_,$estado_ = 0){
		$this.id->$id_;
		$this.pac->$pac_;
		$this.estado->$estado_;
	}

	private function agregar(){
		sql="INSERT INTO `producto`(`id`, `pac`, `estado`) VALUES ('{$this.id}','{$this.pac}','{$this.estado}')";
		conec=new Conexion();
		if(conec.query(sql)){
			echo "se ejecuto";
		}
	}


}


?>
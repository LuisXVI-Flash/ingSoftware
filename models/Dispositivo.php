<?php
include("models/conexion.php");
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
		if($conec->query($sql)){
			echo "se ejecuto";
		}
	}


}
if(isset($_POST["id"]) && isset($_POST["pac"])){
	$valor=0;
	if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
		$valor=1;
	}
	$dis=new Dispositivo($_POST['id'],$_POST["pac"],$valor);
	$dis->agregar();
}



?>
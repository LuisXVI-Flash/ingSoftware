<?php
include_once ("conexion.php");
class Dispositivo extends Conexion{
	private $id;
	private $pac;
	private $estado; 



	public function __construct(){
		$args = func_get_args();
		$nargs = func_num_args();
		switch($nargs){
			case 1:
				self::__construct1($args[0], $args[1], $args[2]);
				break;
			case 2:
				self::__construct2();
				break;
		}
	}

	public function __construct1($id_,$pac_,$estado_){
		$this->id=$id_;
		$this->pac=$pac_;
		$this->estado=$estado_;
	}

	public function __construct2(){
	}

	public function agregar($id,$pack,$estado){

			
			$consulta = "INSERT INTO producto VALUES ('','$id', '$pack', '$estado')";
			$conexion = $this -> obtenerConexion();
            $resultado = $conexion -> query($consulta);
            $conexion -> close();
        
	}
	public function getProductos(){

		$vector = array();
		$conexion = new Conexion();
		$db = $conexion->getConexion();
		$sql = "SELECT * FROM producto";
		$consulta = $db->prepare($sql);
		$consulta->execute();
		while($fila = $consulta->fetch()) {
			$vector[] = array(
			  "id" => $fila['id'],
			  "nombre" => $fila['pac'],
			  "precio" => $fila['estado'] );
			  }//fin del ciclo while 
	 
		 if(empty($vector[0])){
		 $error = array();
		 $error[] = array("error" => "producto no encontrado");
		 return $error[0];
		 }
		 else{
			 return $vector;
		 }
	}
	 
	 public function findProduct($nombre){
	 
		 $vector = array();
		 $conexion = new Conexion();
		 $db = $conexion->getConexion();
		 $sql = "SELECT * FROM producto where pac like '%".$nombre."%'";
		 // $sql = "SELECT * FROM producto where nombre like :nombre";
		 $consulta = $db->prepare($sql);
		 $consulta->bindParam(':nombre', $nombre);  
		 $consulta->execute();
		 while($fila = $consulta->fetch()) {
			 $vector[] = array(
			   "id" => $fila['id'],
			   "nombre" => $fila['pac'],
			   "precio" => $fila['estado'] );
			   }//fin del ciclo while 
	  
		 if(empty($vector[0])){
			 $error = array();
			 $error[] = array("error" => "producto no encontrado");
			 return $error[0];
		 }
		 else{
			 return $vector;
		 }
	  }


}
?>
<?php
require_once("../models/Conexion.php");
class Atendidos extends Conexion{

    public function getAtendidos(){

		$instancia = Conexion::obtenerConexion();
        $resultadoa = mysqli_query($instancia, "SELECT s.idsolicitud,s.fecha, c.nombres, p.pac,p.estado FROM solicitud s,producto p,clientes c WHERE c.idcliente=s.idcliente and p.idproducto=s.idproducto");

        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $r[] = $consultaa;
        }
        return $r;
	}

		//   buscar atendidos
	 
	 public function findAtendidos($nombre){
		$instancia = Conexion::obtenerConexion();
		$nom = $instancia->real_escape_string($nombre);
        // busqueda por nombre para obtener el id
		// $sql = "SELECT * FROM producto where pac like '%".$nom."%'";
        // busqueda por id para mostrar los datos
		// $sql1="SELECT idcliente from clientes where nombres='Juan'";
		// $resultado1 = mysqli_query($instancia, $sql1);
		// $a;
		// while ($consulta1 = mysqli_fetch_array($resultado1)) {
		// 	$a= $consulta1;
		// }

		//listar la busqueda
		$sql = "SELECT s.fecha, c.nombres, p.pac FROM solicitud s,producto p,clientes c WHERE c.idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre.") and p.idproducto=(SELECT idproducto FROM solicitud WHERE idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre.")) and s.fecha=(SELECT fecha from solicitud WHERE idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre."))";
		$r = [];
		$resultadoa = mysqli_query($instancia, $sql);
		var_dump($resultadoa);exit;
		while ($consultaa = mysqli_fetch_array($resultadoa)) {
			$r[] = $consultaa;
		}

		$instancia = Conexion::close();
		return $r;
	  }


    // cambiar el estado de atendido a no atendido



	// metodo para traer los ultimos atendidos

}

?>
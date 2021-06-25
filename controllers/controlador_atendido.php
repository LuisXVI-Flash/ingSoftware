<?php
// require_once('conexion.php');
require_once("..\models\Conexion.php");
require_once("..\models\Atendido.php");
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") {
    if(!empty($_GET['id'])){
      $api = new Atendidos();
      $obj = $api->getAtendidos();
      
      $json = json_encode($obj);
      echo $json;     

    }else{
      $vector = array();
      $api = new Atendidos();
      $vector = $api->getAtendidos();
      
      $json = json_encode($vector);
      echo $json;
    }
}

if($method=="POST"){
  $vector = array();
  $api = new Atendidos();
  $vector = $api->findAtendidos();
  
  $json = json_encode($vector);
  echo $json;

}

// cambiar el estado de atendido a no atendido


// metodo para traer los ultimos atendidos

      

?>
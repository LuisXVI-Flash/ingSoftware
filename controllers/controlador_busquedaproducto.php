<?php

require_once("../models/conexion.php");
require_once("../models/Dispositivo.php");
//require_once("../view/vista_principal.html");
$method = $_SERVER['REQUEST_METHOD']; 


if($method == "GET") {
    if(!empty($_GET['id'])){
      $api = new Dispositivo();
      $obj = $api->getProductos();
      
      $json = json_encode($obj);
      echo $json;     

    }else{
      $vector = array();
      $api = new Dispositivo();
      $vector = $api->getProductos();
      
      $json = json_encode($vector);
      echo $json;
    }
}
?>
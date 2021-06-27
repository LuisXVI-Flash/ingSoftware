<?php

require_once("../models/Conexion.php");
require_once("../models/Cliente.php");
//require_once("../view/vista_principal.html");
$method = $_SERVER['REQUEST_METHOD']; 


if($method == "GET") {
    if(!empty($_GET['id'])){
      $api = new Cliente();
      $obj = $api->getcliente();
      
      $json = json_encode($obj);
      echo $json;     

    }else{
      $vector = array();
      $api = new Cliente();
      $vector = $api->getcliente();
      
      $json = json_encode($vector);
      echo $json;
    }
}
?>
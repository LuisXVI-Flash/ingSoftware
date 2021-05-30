<?php

if(isset($_POST["btngestionarr"]) or isset($_POST["verificar_usuario"] ) or isset($_POST["guardar_usuario"]) or isset($_POST["contrasenia_usuario"]) ){
    header("Location: ../view/FormularioCliente.php");

}else if (isset($_GET["del"])) {
    echo "controladorbaby";
    include_once("../models/Cliente.php");
    include_once("../view/eliminar_cliente.php");
    
}else if(isset($_POST["listar"])) {
    include_once("../models/Cliente.php");
    include_once("../view/Formulario_listar_cliente.php");
    $cliente = new Cliente;
    $array= $cliente->listar_cliente();
    $cli=new Formulario_listar_cliente;
    $cli->Formulario_listar_clienteShow($array);

}else{
    include_once("../view/formulario_Mensaje.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");

}   
?>
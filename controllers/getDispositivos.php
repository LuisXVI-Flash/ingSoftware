<?php
if(isset($_POST["btnAgregarDispositivo"])){
    header("Location: ../view/dispositivo_agregar.php");
}else{
    include_once("../view/formulario_Mensaje.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");

} 

?>
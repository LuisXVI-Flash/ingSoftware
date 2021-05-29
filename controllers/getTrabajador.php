<?php
session_start();

if(isset($_POST['bntAceptar'])){
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    
    $md5 = md5($password);
    if(strlen($login)!=0 or strlen($password)!=0){
        include_once("./controller_Trabajador.php");
        $objControlAcceso = new controllerIdentificarTrabajador;
        $objControlAcceso -> verificarTrabajador($login,$md5);
    }else{
        include_once("../view/formulario_Mensaje.php");
        $objMessaje = new formMensajeSistema;
        $objMessaje -> formMensajeSistemaShow("Los datos ingresados no son validos","../index.php");
    }
}else{
    include_once("../view/formulario_Mensaje.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}

?>
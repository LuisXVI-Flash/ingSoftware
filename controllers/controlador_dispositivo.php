
<?php 
include_once("../models/Sesion.php");
if(isset($_POST["Guardar"])){
    $id = $_POST["id"];
    $pack = $_POST["pac"];
    $valor=0;
    if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
        $valor=1;
    }
    if($id!= null && $pack != null ){
        include_once("../models/Dispositivo.php");
        $dispositivo = new Dispositivo();
        $dispositivo -> agregar($id, $pack, $valor);
        header("Location: ../view/listar_dispositivo.php");
    }    
    /*
    if(isset($_POST["id"]) && isset($_POST["pac"])){
        $valor=0;
        if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
            $valor=1;
        }
        include_once("../models/Dispositivo.php");
        $dis=new Dispositivo($_POST['id'],$_POST["pac"],$valor);
        $dis->agregar();
        header("Location: ../view/listar_dispositivo.php");
    }*/
}else if(isset($_POST["Regresar"])){
    header("Location: ../view/listar_dispositivo.php");
}else if(isset($_POST["Actualizar"])){
    include_once("../view/actualizar_dispositivo.php");
    var_dump($_POST);exit;
    $obj = new editar_dispositivo;
    $obj->editar_dispositivo_show();
}
?>

<?php 

if(isset($_POST["enviar"])){
    if(isset($_POST["id"]) && isset($_POST["pac"])){
        $valor=0;
        if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
            $valor=1;
        }
        include_once("../models/Dispositivo.php");
        $dis=new Dispositivo($_POST['id'],$_POST["pac"],$valor);
        $dis->agregar();
        session_start();
        $_SESSION["estado"] = true;
        $_SESSION["mensaje"] = "Dispositivo agregado correctamente";
        header("Location: ../view/dispositivo_agregar.php");
    }
}
?>
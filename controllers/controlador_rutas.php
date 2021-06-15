<?php
require_once("./models/Sesion.php");
require_once("./models/Conexion.php");
if(isset($_GET["cerrar"])){
    session_destroy();
    header("Location: index.php");
}
if(isset($_SESSION["idcargo"])){

    require_once("./view/layout/header.php");
    
    if(isset($_GET["vista"])){
        if($_GET["vista"]=="cliente"){

        require_once("./controllers/controlador_cliente.php");

    }elseif($_GET["vista"]=="dispositivo"){

        require_once("./controllers/controlador_dispositivo.php");
    }else{
        require_once("./view/vista_principal.html");
    }
    }else{

        require_once("./view/vista_principal.html");

    }
    require_once("./view/layout/footer.php");
}else{
    require_once("./controllers/controller_Trabajador.php");
}

?>
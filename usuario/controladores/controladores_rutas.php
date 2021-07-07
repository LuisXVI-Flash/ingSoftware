<!-- elseif(isset($_GET["solicitar"])) {
    require_once("./controllers/controlador_activacion.php");
} -->

<?php
$ruta_actual="TECA";

require_once("./vistas/layout/header.html");
if(isset($_GET["vista"])){
    if($_GET["vista"]=="activacion"){
        $ruta_actual="Activacion";
        require_once("./modelos/cliente.php");
        require_once("./vistas/solicitar_activacion.html");

    }elseif($_GET["vista"]=="contacto"){
        require_once("./vistas/principal_contacto.html");
    } else{
        require_once("./vistas/Principal.html");
    }









}else{
    require_once("./vistas/Principal.html");
}
require_once("./vistas/layout/footer.html");

?>


<?php 

function abrir_sesion(){
    if(!isset($_SESSION['idcargo'])){
        session_start();
    }
}
function cerrar_sesion(){
    if(isset($_SESSION['idcargo'])){
        session_destroy();
        
    }
}

if(isset($_SESSION["idcargo"])){
    session_start();
}


?>
<?php 
require_once("view/layout/header.html")?>
<?php 

if(isset($_GET["vista"])){ 
    
    if($_GET["vista"]=="dispositivo"){
    require_once("models/Dispositivo.php");
    require_once("view/dispositivo_agregar.html");
   
}
    if($_GET["vista"]=="cliente"){
        include_once("models/Cliente.php");
        include_once("view/FormularioCliente.php");
        if(isset($_POST["nombres"])&& isset($_POST["apellidos"])&&isset($_POST["correo"])&&$_POST["dni"]&&$_POST["celular"]){
$cliente = new Cliente;
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
//$patron1 = "[a-zA-Z]{2,30}";

$cliente -> registrar_cliente($nombres, $apellidos, $correo, $dni, $celular);
echo "Se agregó a al base de datos";}
    }
}
?>
<?php 
require_once("view/layout/footer.html")

?>
<?php 
include_once("../models/Cliente.php");
$cliente = new Cliente;
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
//$patron1 = "[a-zA-Z]{2,30}";

$cliente -> registrar_cliente($nombres, $apellidos, $correo, $dni, $celular);
echo "Se agregó a al base de datos";
/*if (preg_match($patron1, $nombres)){
    echo "listo";
}
else{pero 
    echo "No debe tener números en esta sección";
}*/
/*if (preg_match(, $apellidos)){

}
else{
    print "No debe tener números en esta sección";
}
if (preg_match(, $correo)){
    
}
else{
    print "Debe presentar las caracteristicas de un correo";
}
if (preg_match(, $dni)){
    
}
else{
    print "Debe tener 8 digitos";
}
if (preg_match(, $celular)){
    
}
else{
    print "Debe presentar números";
}*/
?>
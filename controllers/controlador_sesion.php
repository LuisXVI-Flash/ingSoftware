

<?php 
require_once("./models/Sesion.php");

if(isset($_SESSION)){
    include_once("./view/vista_principal.php");
    $objBienvenida = new vista_principal;
    $objBienvenida -> vista_principalShow();
}else{
    include("./view/form_login.php"); 
	$objformIdentificarUsuario = new formIdentificarUsuario;
	$objformIdentificarUsuario -> formIdentificarUsuarioShow();
}
?>
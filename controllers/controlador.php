<?php 
require_once("view/layout/header.html")?>
<?php 

if(isset($_GET["vista"])){ 
    
    if($_GET["vista"]=="dispositivo"){
    require_once("models/Dispositivo.php");
    require_once("view/dispositivo_agregar.html");
   
}}
?>
<?php 
require_once("view/layout/footer.html")

?>
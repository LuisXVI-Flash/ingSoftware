<?php 
include("models/Dispositivo.php");
?>
<title>Ingeniería de Software</title>

<?php 

	
if($_GET){
	$est=$_GET['estado'];
	if($est="on"){

	}
	

}else{
	?>
<form method="get">
<table>
	<thead><tr>
		<td colspan="2">FORMULARIO </td>
	</tr></thead>
	<tr>
		<td><label>ID</label></td>
		<td><input type="number" name="id"></td>
	</tr>
	<tr>
		<td><label>PAC</label></td>
		<td><input type="number" name="pac"></td>
	</tr>
	<tr>
		<td><label>Estado</label></td>
		<td><input type="checkbox" name="estado"></td>
	</tr>
	<tr>
		<td colspan="2"> <input type="submit" name="enviar"></td>
	</tr>
</table>
</form>
	<?php
}

?>

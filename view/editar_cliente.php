<?php
class editar_cliente{
    public function editar_cliente_show($cliente){
        session_start();
        include_once("../view/vista_principal.php");
        $vista = new vista_principal;
        $vista->vista_principalShow();
?>
<div class="container__cliente">
<h2>Editar Cliente</h2>
    <form action="../controllers/controlador_cliente.php" method="POST" class="container_formulario">
        <label>id cliente: </label>
        <input type="text" name="idcliente" value="<?php echo $cliente['idcliente'] ?>"><br>

        <label>nombres: </label>
        <input type="text" name="nombres" value="<?php echo $cliente['nombres'] ?>"><br>

        <label>apellidos: </label>
        <input type="text" name="apellidos" value="<?php echo $cliente['apellidos'] ?>"><br>

        <label>correo: </label>
        <input type="text" name="correo" value="<?php echo $cliente['correo'] ?>"><br>

        <label>dni: </label>
        <input type="text" name="dni" value="<?php echo $cliente['dni'] ?>"><br>

        <label>celular: </label>
        <input type="text" name="celular" value="<?php echo $cliente['celular'] ?>"><br>

        <br>

        <input type="submit" name="test" class="btn btn-secondary" value="GUARDAR"><br />
    </form>
</div>
<?php

//pasar elvalor de los label a variables


//funcion que llama el boton guardar
include_once('../view/layout/footer.php');
?>

<?php
//para llamar a la funcion en el boton :v no preguntes solo gozalo
if (array_key_exists('test', $_POST)) {
    editarcliente($a, $nombres, $apellidos, $correo, $dni, $celular);
}
        
}
}
?>


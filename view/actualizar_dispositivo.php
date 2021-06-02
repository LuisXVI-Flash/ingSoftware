<?php
class editar_dispositivo{
    public function editar_dispositivo_show($cliente){
        session_start();
        include_once("../view/vista_principal.php");
        $vista = new vista_principal;
        $vista->vista_principalShow();
?>
<div class="container container__cliente">
    <form action="../controllers/controlador_cliente.php" method="POST">
        <label>Id dispositivo: </label>
        <input type="text" name="idcliente" value="<?php echo $cliente['idcliente'] ?>"><br>

        <label>Pack: </label>
        <input type="text" name="nombres" value="<?php echo $cliente['nombres'] ?>"><br>

        <label>Estado: </label>
        <input type="text" name="apellidos" value="<?php echo $cliente['apellidos'] ?>"><br>

        <br>

        <input type="submit" name="test" value="GUARDAR"><br />
    </form>
</div>
<?php

//pasar elvalor de los label a variables


//funcion que llama el boton guardar
include_once('../view/layout/footer.php');
    }
}
?>
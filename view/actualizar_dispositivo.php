<?php
class editar_dispositivo{
    public function editar_dispositivo_show($dispositivo){
        session_start();
        include_once("../view/vista_principal.php");
        $vista = new vista_principal;
        $vista->vista_principalShow();
?>
<div class="container container__cliente">
    <form action="../controllers/controlador_dispositivo.php?idproducto=<?php echo $dispositivo['idproducto']?>" method="POST">
        <label>Id dispositivo: </label>
        <input type="text" name="id" value="<?php echo $dispositivo['id'] ?>"><br>

        <label>Pack: </label>
        <input type="text" name="pac" value="<?php echo $dispositivo['pac'] ?>"><br>

        <label>Estado: </label>
        <input type="text" name="estado" value="<?php echo $dispositivo['estado'] ?>"><br>

        <br>

        <input type="submit" name="actualizar" value="GUARDAR"><br />
    </form>
</div>
<?php

//pasar elvalor de los label a variables


//funcion que llama el boton guardar
include_once('../view/layout/footer.php');
    }
}
?>
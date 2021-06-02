<?php 
class Formulario_listar_cliente{
    public function Formulario_listar_clienteShow($array){
session_start();
include_once("../view/vista_principal.php");
$obj= new vista_principal;
$obj->vista_principalShow();

if(empty($_SESSION)){
    ?>
<style type="text/css">
.col-lg-3 {
    display: none !important;
}
</style>
<?php
    include_once("../view/formulario_Mensaje.php");
    (new formMensajeSistema())->accesso_denegado();
    exit;
}

?>
 

<br><h4 style="text-align: center;" class="card-title">Lista de clientes</h4><br><br>
<div class="content__table">
  <form action="../controllers/getCliente.php" method="post">
    <input type="submit" name="btngestionarr" value="Agregar" class="btn btn-primary mx-2" style="float: right">
</form>  
</div>
<div class="content__table">

    <table class="table table-hover" style="width: 60%;">
    
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">DNI</th>
                <th scope="col">Celular</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php
                        foreach($array as $array){
                    ?>
            <tr>
                <form action="../controllers/controlador_cliente.php?id=<?php echo $array['idcliente'] ?>"
                    method="POST">
                    <td scope="row"><?php echo $array['idcliente'] ?></td>
                    <td scope="row"><?php echo $array['nombres'] ?></td>
                    <td scope="row"><?php echo $array['apellidos'] ?></td>
                    <td scope="row"><?php echo $array['correo'] ?></td>
                    <td scope="row"><?php echo $array['dni'] ?></td>
                    <td scope="row"><?php echo $array['celular'] ?></td>
                    <td class="content__btn">
                        <input type="submit" name="Editar" value="Editar" class="btn  btn-secondary btn-sm">
                        <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-primary btn-sm">
                    </td>
                </form>
            </tr>
            <?php    }
                    ?>

            <?php

                    ?>

            <?php
                    
                    ?>
        </tbody>
    </table>
</div>
<?php 
 include '../view//layout/footer.php';
}
}
?>
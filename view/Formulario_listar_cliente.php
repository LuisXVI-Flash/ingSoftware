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
         .col-lg-3{
             display: none !important;
         }
     </style> 
    <?php
    include_once("../view/formulario_Mensaje.php");
    (new formMensajeSistema())->accesso_denegado();
    exit;
}

?>

<div class="col-lg-9"> 
    <div class="container">
            <table class="table table-borderless primary">
                <thead>
                    <tr>
                        <th scope="col">idcliente</th>
                        <th scope="col">nombres</th>
                        <th scope="col">apellidos</th>
                        <th scope="col">correo</th>
                        <th scope="col">dni</th>
                        <th scope="col">Celular</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($array as $array){
                    ?>
                            <tr>
                <form action="../controllers/controlador_cliente.php?id=<?php echo $array['idcliente'] ?>" method="POST">
                    <td scope="row"><?php echo $array['idcliente'] ?></td>
                    <td scope="row"><?php echo $array['nombres'] ?></td>
                    <td scope="row"><?php echo $array['apellidos'] ?></td>
                    <td scope="row"><?php echo $array['correo'] ?></td>
                    <td scope="row"><?php echo $array['dni'] ?></td>
                    <td scope="row"><?php echo $array['celular'] ?></td>
                    <td><input type="submit" name="Editar" value="Editar" class="btn btn-primary">
						<input type="submit" name="Eliminar" value="Eliminar" class="btn btn-secondary">
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
</div>
<?php 
 include '../view//layout/footer.php';
}
}
?>
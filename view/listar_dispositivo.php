<?php 
	session_start();
	include '../view/vista_principal.php';
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

<br><h4 style="text-align: center;" class="card-title">Lista de Dispositivos</h4><br><br>

           
            <div  class="content__table">
                <form method="GET" id="formbuscar" autocapitalize="false" autocomplete="off" class="row g-3">
                    <div class="col-auto">
                        <input type="text" name="buscar" id="buscar" class="form-control">
                    </div>
                    <div class="col-auto">
                    <input class="btn btn-primary" type="submit" value="buscar" placeholder="busqueda.." id="btnbuscar">
                    </div>
                </form>

            </div><br>
<!--<div class="alert" id="mensaje"></div>-->
<div class="content__table">
<br><br>
<form action="../controllers/getDispositivos.php" method="post">
    <input type="submit" name="btnAgregarDispositivo" value="Agregar" class="btn btn-primary mx-2" style="float: right">
</form>
</div>
<div class="content__table">
    <table  class="table table-hover" style="width: 50%;">
        <thead>
            <tr>
                <td>ID</td>
                <td>PAC</td>
                <td>Estado</td>
                <td>Acciones</td>
            </tr>
        </thead>
        
        
            <tbody id="tbody">

            </tbody>
       
        
    </table>
<form id="uwu" action="../controllers/controlador_dispositivo.php" method="post" >
<template id="template-table">

    <tr class="trow">
        <td id="id" name="id"></td>
        <td id="nombre" name="pack"></td>
        <td id="precio" name="estado"></td>
        <td style="display:flex;flex-direction:row">
        <button type="submit" class="btn  btn-secondary btn-sm" id="Actualizar" name="Actualizar">Actualizar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="Borrar" name="Borrar" >Borrar</button>
        </td>
    </tr>
 
</template>
</form>  
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function goBack() {
    window.history.back();
}
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>
<script src="../js/main.js"></script>
<?php
	include '../view//layout/footer.php';
?>

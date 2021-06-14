<?php 
	session_start();
	include '../view/vista_principal.php';
    $obj= new vista_principal;
    $obj -> vista_principalShow();

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
<div class="content__table" id="datos">

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

<script src="../js/jquery.min.js"></script>
<script src="../js/busqueda.js"></script>
<?php
	include '../view//layout/footer.php';
?>

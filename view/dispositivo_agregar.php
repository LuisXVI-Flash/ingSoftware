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
<!-- <div class="container__agregar"> -->
<div class="container__agregar">
    <?php if(isset($_SESSION["estado"]) && $_SESSION["mensaje"]): ?>
    <div class="col-12 p-0">
        <div class="toast-container">
            <div class="toast" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto text-primary">Mensaje</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                    <?php echo $_SESSION["mensaje"];?>
                </div>
            </div>
        </div>
    </div>
    <?php unset($_SESSION["estado"], $_SESSION["mensaje"]); ?>
    <?php endif; ?>
    <div class="card text-dark bg-light mb-3" style="width: 40rem;">
        <div class="card-header fw-bold text-center">Registrar Dispositivo</div>

            <div class="container container__dispositivo">
                <div class="container__form">
                <form method="post" action="../controllers/controlador_dispositivo.php">
                    <table>
                        <thead>
                            <tr>
                                <td colspan="2">FORMULARIO </td>
                            </tr>
                        </thead>
                        <tr>
                            <td><label>ID</label></td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td><label>PAC</label></td>
                            <td><input type="text" name="pac"></td>
                        </tr>
                        <tr>
                            <td><label>Estado</label></td>
                            <td><input type="checkbox" name="estado"></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input type="submit" class="btn btn-primary mx-2" value="Guardar" name="Guardar"></td>
                            <td colspan="2"> <input type="submit" class="btn btn-secondary" value="Regresar" name="Regresar"></td>
                        </tr>
                    </table>
                </form>
            </div>
    </div>
</div>
<!-- </div> -->
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
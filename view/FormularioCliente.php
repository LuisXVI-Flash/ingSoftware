<?php 
    /*class FormularioCLiente{
        public function formularioClienteShow(){*/
            session_start();
            include_once("../view/vista_principal.php");
            $obj= new vista_principal;
            $obj->vista_principalShow();
            $stylesheet = true;
            /*
            if (isset($_SESSION) && isset($_SESSION["idcargo"]) && isset($_SESSION["nombreCargo"]) && ($_SESSION["nombreCargo"] === "administrador de datos" && $_SESSION["idcargo"] == 3)) {
                // echo "<br>Abriendo vista";
                echo(__LINE__);exit;
            }else {
               
           }*/
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

<div class="container__cliente">
    <?php if(isset($_SESSION["estado"]) && $_SESSION["mensaje"]): ?>
    <div class="row">
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
    </div>
    <?php unset($_SESSION["estado"], $_SESSION["mensaje"]); ?>
    <?php endif; ?>
    <!-- <div class="container__cliente"> -->
        <div class="card-header fw-bold text-center">Registrar Usuario</div>
        <!-- <div class="col-lg-9">
            <div class="container"> -->
                <div class="btns-gestionar p-2">
                    <!-- <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist"aria-orientation="vertical"> -->
                        <form action="../controllers/controlador_cliente.php" method="POST" class="container_formulario">
                            <div>
                                <label for="nombres">Nombres</label><br>
                                <input class="input__form" name="nombres" placeholder="Ingrese Nombre" id="nombres" type="text" required
                                    pattern="[A-Za-z ]{2,30}"
                                    title="Sebe contener letras de la a-z, mayúsculas o minúsculas">
                            </div>
                            <div>
                                <label for="apellidos">Apellidos</label><br>
                                <input class="input__form" name="apellidos" placeholder="Ingrese Apellidos" id="apellidos" required
                                    pattern="[A-Za-z ]{2,30}"
                                    title="Debe contener letras de la a-z, mayúsculas o minúsculas">
                            </div>
                            <div>
                                <label for="correo">Correo</label><br>
                                <input class="input__form" name="correo" placeholder="Correo" id="correo" type="email" required>
                            </div>
                            <div>
                                <label for="dni">DNI</label><br>
                                <input class="input__form" name="dni" placeholder="DNI" id="dni" type="text" minlength="8" maxlength="8"
                                    name="dni" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                    required>
                            </div>
                            <div>
                                <label for="celular">Celular</label><br>
                                <input class="input__form" name="celular" placeholder="Celular" id="celular" type="text" required
                                    pattern="[0-9]{9}" title="Debe contener una cantidad de 9 números">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center"><br>
                                <a class="btn btn-secondary" href="../controllers/controlador_cliente.php?value=Regresar" >Regresar</a>
                                <button type="submit" name="Agregar" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    <!-- </div> -->
                </div>
            <!-- </div>
        </div> -->
    <!-- </div> -->
</div>
<script type="text/javascript">
function goBack() {
    window.history.back();
}
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>
<?php 
            include '../view//layout/footer.php';
    /*    }
        
    }*/

?>
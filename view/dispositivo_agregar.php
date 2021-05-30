<?php
	session_start();
	include '../view/vista_principal.php';
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
        <div class="row row-form-content">
            <div class="col-12">
            <div class="card-body m-auto" style="width: 80%;">
				<div class="form-row d-flex mt-3">
                    <div class="tab-pane fade show " id="v-pills-home" role="tabpanel">
                        <div  class="card text-dark bg-light mb-3" style="width: 40rem;">
                            <div class="card-header fw-bold text-center">Registrar Dispositivo</div>
                                <div class="col-lg-9"> 
                                    <div class="container">
                                        <div class="btns-gestionar p-2">
			  	                            <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
												<form method="post" action="../controllers/controlador_dispositivo.php">
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
											</div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
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
	            $(document).ready(function(){
	                $('.toast').toast('show');
	            });
	        </script>
<?php
	include '../view//layout/footer.php';
?>

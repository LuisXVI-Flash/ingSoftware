<?php
    
    class controllerIdentificarTrabajador{
        public function verificarTrabajador($login,$password){
            
            include_once("../models/Trabajador.php");
            $objUser = new Trabajador;
            $respuesta = $objUser -> validarTrabajador($login,$password);
            
            if($respuesta==0){
                include_once("../view/formulario_Mensaje.php");
                $objMensaje = new formMensajeSistema;
                $objMensaje -> formMensajeSistemaShow("No existe usuario con esos datos o esta deshabilitado","../index.php");
            }else{
                include_once("../models/Cargo_Trabajador.php");
                $objDetalle = new Cargo_Trabajador;
                $resultado = $objDetalle -> obtenerPrivilegios($login);
                if($resultado == 1){
                    
                    include_once("../view/vista_principal.php");
                    $objBienvenida = new vista_principal;
                    $objBienvenida -> vista_principalShow();
                }else{
                    include_once("../view/formulario_Mensaje.php");
                    $objMensaje = new formMensajeSistema;
                    $objMensaje -> formMensajeSistemaShow("El usuario actual no cuenta con cargo","../index.php"); 
                }
                
            }
        }
    }
?>
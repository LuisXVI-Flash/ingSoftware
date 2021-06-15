<?php
    
    class Trabajador extends conexion {
        
        public function validarTrabajador($login,$password){
            $conexion = Conexion::obtenerConexion();
            $consulta = "SELECT usuario FROM trabajadores where usuario = '$login' AND contraseña= '$password' AND estado = 1";
            
            $resultado = mysqli_query($conexion,$consulta);
            $aciertos = mysqli_num_rows($resultado);
            if($aciertos==1)
                return(1);
            else
                return(0);
        }
    }
?>
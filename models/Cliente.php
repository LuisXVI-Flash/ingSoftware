?<?php 
    include_once ("conexion.php");
    Class Cliente extends Conexion {
        public function registrar_cliente($nombres, $apellidos, $correo, $dni, $celular) {
            $consulta = "INSERT INTO clientes (nombres, apellidos, correo, dni, celular) VALUES ('$nombres', '$apellidos', '$correo', '$dni', '$celular')";
            $conexion = $this -> obtenerConexion();
            $resultado = $conexion -> query($consulta);
            $conexion -> close();
            return $resultado -> fetch_all();
        }
    }
?>

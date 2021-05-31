<?php 

if(isset($_POST['Agregar'])){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $celular = $_POST['celular'];
    if($nombres!= null && $apellidos != null && $correo!=null && $dni!=null && $celular!=null){
        include_once("../models/Cliente.php");
        $cliente = new Cliente;
        $cliente -> registrar_cliente($nombres, $apellidos, $correo, $dni, $celular);
        session_start();
        $_SESSION["estado"] = true;
        $_SESSION["mensaje"] = "Cliente agregado correctamente";
        header("Location: ../view/FormularioCliente.php");
    }    
}else if (isset($_POST['Editar'])) {
    $id = $_GET['id'];
    include_once("../models/Cliente.php");
    include_once("../view/editar_cliente.php");
    $obj_cl = new Cliente;
    $cliente = $obj_cl->obtener_un_cliente($id);
    $formEditar = new editar_cliente;
    $formEditar->editar_cliente_show($cliente);
    
}else if(isset($_POST['test'])){
    $a = $_POST['idcliente'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $celular = $_POST['celular'];

    //deberían ir restricciones???
    include_once("../models/Cliente.php");
    $obj_act = new Cliente;
    $obj_act->editarcliente($a,$nombres,$apellidos,$correo,$dni,$celular);
    ?>

    <script type="text/javascript">
        alert("Cliente modificado exitosamente");
    </script>

<?php
    include_once("../view/Formulario_listar_cliente.php");
    $cliente = new Cliente;
    $array= $cliente->listar_cliente();
    $cli=new Formulario_listar_cliente;
    $cli->Formulario_listar_clienteShow($array);
}
?>
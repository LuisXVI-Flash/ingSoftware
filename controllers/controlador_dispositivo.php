
<?php 

if(isset($_POST["Guardar"])){
    $id = $_POST["id"];
    $pack = $_POST["pac"];
    $valor=0;
    if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
        $valor=1;
    }
    if($id!= null && $pack != null ){
        include_once("../models/Dispositivo.php");
        $dispositivo = new Dispositivo();
        $dispositivo -> agregar($id, $pack, $valor);
        header("Location: ../view/listar_dispositivo.php");
    }    
    /*
    if(isset($_POST["id"]) && isset($_POST["pac"])){
        $valor=0;
        if(isset($_POST["estado"]) && $_POST["estado"]=="on"){
            $valor=1;
        }
        include_once("../models/Dispositivo.php");
        $dis=new Dispositivo($_POST['id'],$_POST["pac"],$valor);
        $dis->agregar();
        header("Location: ../view/listar_dispositivo.php");
    }*/
}else if(isset($_POST['verificador'])){
    include_once("../models/Dispositivo.php");
    $salida = "";
    if(isset($_POST['consulta'])){
        $consulta = $_POST['consulta'];
        $dispositivo = new Dispositivo();
        $array = $dispositivo->findProduct($consulta);
    }else{
        $dispositivo = new Dispositivo();
        $array = $dispositivo->getProductos();
    }

    //echo __LINE__;exit;
    //var_dump('<pre>',$array,'</pre>');exit;
    if(count($array) > 0){
        $salida .= "
        <table  class='table table-hover' style='width: 50%;'>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>PAC</td>
                    <td>Estado</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody id='tbody'>
        ";
        foreach($array as $array){
            $salida .= "
            
            <tr>
                
                    <td scope='row'>".$array['id']."</td>
                    <td scope='row'>".$array['pac'] ."</td>
                    <td scope='row'>".$array['estado']."</td>
                    <td class='content__btn'>
                    <form action='../controllers/controlador_dispositivo.php?id=".$array['id']."'
                    method='POST'>
                        <input type='submit' name='Editar' value='Editar' class='btn  btn-secondary btn-sm'>
                    </form>
                    <form action='../controllers/controlador_dispositivo.php?idproducto=".$array['idproducto']."'
                    method='POST'>
                        <input type='submit' name='Eliminar' value='Eliminar' class='btn btn-primary btn-sm'>
                    </form>
                    </td>
                
            </tr>
            ";
        }
        $salida .= "</tbody>
            </table>
        ";
    }else{
        $salida .= "No hay datos uwu ";
    }
    echo $salida;
}else if(isset($_POST['Editar'])){
    $id = $_GET['id'];
    include_once("../models/Dispositivo.php");
    include_once("../view/actualizar_dispositivo.php");
    $obj_dis = new Dispositivo;
    $dispositivo = $obj_dis->obtener_un_dispositivo($id);
    $formEditar = new editar_dispositivo;
    $formEditar->editar_dispositivo_show($dispositivo);
}else if(isset($_POST['actualizar'])){
    $idproducto = $_GET['idproducto'];
    $id = $_POST['id'];
    $pac = $_POST['pac'];
    $estado = $_POST['estado'];
    //deberían ir restricciones???
    include_once("../models/Dispositivo.php");
    $obj_act = new Dispositivo;
    $obj_act->editardispositivo($idproducto,$id,$pac,$estado);
    ?>

    <script type="text/javascript">
        alert("Producto modificado exitosamente");
    </script>
<?php
    header("Location: ../view/listar_dispositivo.php");
}else if (isset($_POST['Eliminar'])){
    $id=$_GET['idproducto'];
    echo $id;
    include_once("../models/Dispositivo.php");
    $d = new Dispositivo;
    $d->eliminardispositivo($id);
    ?>

    <script type="text/javascript">
        alert("Producto eliminado exitosamente");
    </script>

<?php
    header("Location: ../view/listar_dispositivo.php");
}else if(isset($_POST["Regresar"])){
    header("Location: ../view/listar_dispositivo.php");
}
?>
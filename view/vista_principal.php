<?php

class vista_principal
{
    public function vista_principalShow()
    {
        include("../view/layout/header.html");
?>
        <br>
        <?php

        if ($_SESSION['idcargo'] == 1) {
        ?>

            <a class="nav-link disabled" href="#">Configuración</a>

            <!--<a class="nav-link" href="../configuracionModulo/formGestionar.php">Gestionar Datos Usuario</a> -->

            <form action="../controllers/getGestionarUsuario.php" method="POST">
                <button class="btn btn-link" type="submit" name="btngestionarr">Gestionar Datos Usuario</button>
            </form>



        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2 || $_SESSION['idcargo'] == 3) {
        ?>
            <a class="nav-link disabled" href="#">Listar</a>

        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2) { ?>

            <form action="../controllers/getistarDispositivos.php?view=listarDispositivos" method="POST">
                <button class="btn btn-link" type="submit" name="btnasignar">Listar Dispositivos</button>
            </form>
            

            <form method="POST" action="../controllers/getListarClientes.php?view=listarClientes">
                <li><button class="btn btn-link" name="btnInforme" id="btnInforme">Listar Clientes</button></li>
            </form>

            
        <?php }
        if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
            ?>
             <form method="POST" action="../controllers/getListarSolicitudes.php?view=listarSolicitudes">
                <li><button class="btn btn-link" name="btnInforme" id="btnInforme">Listar Solicitudes</button></li>
            </form>
            
        <?php }
        ?>
        

        </nav>
        </div>
        </div>

<?php

    }
}
?>
<?php

class vista_principal
{
    public function vista_principalShow()
    {
        include("../view/layout/header.php");
?>
        <br>
        <?php

        if ($_SESSION['idcargo'] == 1) {
        ?>

            <a class="nav-link disabled" href="#">Configuracion</a>

            <!--<a class="nav-link" href="../configuracionModulo/formGestionar.php">Gestionar Datos Usuario</a> -->

            <form action="../controllers/getCliente.php" method="POST">
                <button class="btn btn-link" type="submit" name="btngestionarr">Agregar Cliente</button>
            </form>
            <form action="../controllers/getDispositivos.php" method="POST">
                <button class="btn btn-link" type="submit" name="btnAgregarDispositivo">Agregar Dispositivos</button>
            </form>



        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2 || $_SESSION['idcargo'] == 3) {
        ?>
            <a class="nav-link disabled" href="#">Listar</a>

        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2) { ?>

           
            <form action="../controllers/getCliente.php" method="POST">
                <button class="btn btn-link" type="submit" name="listar">Listar Cliente</button>
            </form>

            
        <?php }
        if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
            ?>
             <form method="POST" action="../controllers/getListarSolicitudes.php?view=listarSolicitudes">
                <li><button class="btn btn-link" name="btnInforme" id="btnInforme">Listar Dispositivos</button></li>
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
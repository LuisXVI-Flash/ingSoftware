<?php

class vista_principal
{
    public function vista_principalShow()
    {
        include("../view/layout/header.php");
?>
        <div class="sidebar__content" id="sidebar">
        <?php

        if ($_SESSION['idcargo'] == 1) {
        ?>


        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2 || $_SESSION['idcargo'] == 3) {
        ?>
            <a class="nav-link disabled" href="#">Gestión</a>

        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2) { ?>

           
            <form action="../controllers/getCliente.php" method="POST">
                <button class="btn btn-link" type="submit" name="listar">Cliente</button>
            </form>

            
        <?php }
        if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
            ?>
             <form method="POST" action="../controllers/getDispositivos.php">
                <button class="btn btn-link" name="Listar" id="Listar">Dispositivo</button>
            </form>
            
        <?php }
        ?>
        
        </div>

<?php
        include("../view/layout/footer.php");
    }
}
?>
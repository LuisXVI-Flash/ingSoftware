<!DOCTYPE html>
<html lang="es-PE">
  <head>
    <meta charset="UTC-5" />
    <!-- <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='description' content=''>
        <meta name='author' content=''>
        <link rel='icon' href='/docs/4.0/assets/img/favicons/favicon.ico'> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <title>TECA PERU S.A.C</title>
    <!-- <script src='../js/bootstrap.min.js'></script> -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
      integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
      crossorigin="anonymous"
    ></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <!-- <script src="../js/toggle.js"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="./js/busqueda_cliente.js"></script>
  </head>
  <body>
    <?php
            if (isset($_SESSION["idcargo"])) {
              ?>
    <nav class="navbar navbar-light" style="background-color: #003862">
      <div class="container-fluid">
        <ul class="nav justify-content-start">
          <li class="nav-item">
            <a
              href="index.php"
              ><img src="./assets/teca-white.png" alt="logo-teca" width="120px" height="40px"></a>
          </li>>
          <li class="nav-item">
          <button class="btn_toggle" id="toggle"><i class="fas fa-bars" style="height: 50px;"></i></button>
          </li>
        </ul>

        <ul class="nav justify-content-end">
          <li class="nav-item">
            <span
              class="iconify"
              data-inline="false"
              data-icon="bx:bx-user"
              style="color: #FFFF; font-size: 50px"
            ></span>
          </li>
          <li class="nav-item">
            <p class="nav-link text-center" style="color: #FFFFFF">
              Usuario:
              <?php echo $_SESSION['trabajador']?><br /><?php echo $_SESSION["nombreCargo"]?>
            </p>
          </li>
          <li class="nav-item">
            <p class="nav-link"></p>
          </li>
          <li class="nav-item">
            <p></p>
            <a class="btn btn-light btn-sm " href="?cerrar">Cerrar Sesion</a>
           
          </li>
        </ul>
      </div>
    </nav>
    <div class="container__dispositivo">
      <!-- <div class="col-lg-3">
        <div class="container-fluid">
          <nav class="nav flex-column"> -->
            <?php
            }
            ?>

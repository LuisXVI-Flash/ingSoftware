<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>TECA</title>
<f/head>
<body>
    <form action="../controller/controlador_cliente.php" method="POST">
    <h1>Registro de Clientes</h1>
        <div>
            <label for = "nombres">Nombres</label>
            <input name="nombres" placeholder="Ingrese Nombre" id="nombres" type= "text" required pattern="[A-Za-z ]{2,30}" title="Sebe contener letras de la a-z, mayúsculas o minúsculas"> 
        </div>
        <div>
            <label for = "apellidos">Apellidos</label>
            <input name="apellidos" placeholder="Ingrese Apellidos" id="apellidos" required pattern="[A-Za-z ]{2,30}" title="Debe contener letras de la a-z, mayúsculas o minúsculas"> 
        </div>
        <div>
            <label for = "correo">Correo</label>
            <input name="correo" placeholder="Correo" id="correo" type="email" required> 
        </div>
        <div>
            <label for = "dni">DNI</label>
            <input name="dni" placeholder="DNI" id="dni" type="text" minlength="8" maxlength="8" name="dni" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required> 
        </div>
        <div>
            <label for = "celular">Celular</label>
            <input name="celular" placeholder="Celular" id="celular" type="text" required pattern="[0-9]{9}" title="Debe contener una cantidad de 9 números"> 
        </div>
        <button type="submit" class="btn">Agregar</button>
    </form>
</body>
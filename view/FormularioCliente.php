<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Dibruesma E.I.R.L.</title>
</head>
<body>
    <form action="../controller/controlador_cliente.php" method="POST">
    <h1>Registro de Clientes</h1>
        <div>
            <label for = "nombres">Nombres</label>
            <input name="nombres" placeholder="Ingrese Nombre" id="nombres" required> 
        </div>
        <div>
            <label for = "apellidos">Apellidos</label>
            <input name="apellidos" placeholder="Ingrese Apellidos" id="apellidos" required> 
        </div>
        <div>
            <label for = "correo">Correo</label>
            <input name="correo" placeholder="Correo" id="correo" type="email"> 
        </div>
        <div>
            <label for = "dni">DNI</label>
            <input name="dni" placeholder="DNI" id="dni" type="text" minlength="8" maxlength="8" name="dni" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required> 
        </div>
        <div>
            <label for = "celular">Celular</label>
            <input name="celular" placeholder="Celular" id="celular"> 
        </div>
        <button type="submit" class="btn">Enviar</button>
    </form>
</body>
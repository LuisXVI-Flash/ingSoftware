<?php

if (isset($_POST["guardar_usuario"])) {
    require_once __DIR__ . "/controladorGestionarUsuario.php";
    $cargo = (isset($_POST["cargo"]) && !empty(trim($_POST["cargo"]))) ? $_POST["cargo"] : null;
    $nombre = (isset($_POST["nombre"]) && !empty(trim($_POST["nombre"]))) ? $_POST["nombre"] : null;
    $apellido = (isset($_POST["apellido"]) && !empty(trim($_POST["apellido"]))) ? $_POST["apellido"] : null;
    $contrasenia_1 = (isset($_POST["contrasenia_1"]) && !empty(trim($_POST["contrasenia_1"]))) ? $_POST["contrasenia_1"] : null;
    $contrasenia_2 = (isset($_POST["contrasenia_2"]) && !empty(trim($_POST["contrasenia_2"]))) ? $_POST["contrasenia_2"] : null;
    $user_nick = (isset($_POST["user_nick"]) && !empty(trim($_POST["user_nick"]))) ? $_POST["user_nick"] : null;
    $email = (isset($_POST["email"]) && !empty(trim($_POST["email"]))) ? $_POST["email"] : null;

    if (isset($cargo) && isset($nombre) && isset($apellido) && isset($contrasenia_1) && isset($contrasenia_2) && isset($user_nick) && isset($email)) {
        
        if ($contrasenia_1 !== $contrasenia_2) { // Si la contraseña no es igual. retonamos mensaje
            session_start();
            $_SESSION["mensaje"] = "La contraseña es incorrecta, por favor verifique";
            $_SESSION["estado"] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $controlador = new controladorGestionarUsuario();
        $controlador->call_insertar([ // Llama a la función insertar usuario interno
            "idcargo" => (int) $cargo,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "pasword" => md5($contrasenia_1),
            "usuario" => $user_nick,
            "email" => $email,
        ]);
    } else {
        session_start();
        $_SESSION["estado"] = true;
        $_SESSION["mensaje"] = "Completa los campos";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
} 
if (isset($_POST["contrasenia_usuario"])) {
    require_once __DIR__ . "/controladorGestionarUsuario.php";
    $usuario = (isset($_POST["usuario"]) && !empty(trim($_POST["usuario"]))) ? $_POST["usuario"] : null;
    $contrasenia_1 = (isset($_POST["contrasenia_1"]) && !empty(trim($_POST["contrasenia_1"]))) ? $_POST["contrasenia_1"] : null;
    $contrasenia_2 = (isset($_POST["contrasenia_2"]) && !empty(trim($_POST["contrasenia_2"]))) ? $_POST["contrasenia_2"] : null;

    if (isset($contrasenia_1) && isset($contrasenia_2) && isset($usuario)) {

        if ($contrasenia_1 !== $contrasenia_2) {
            //session_start();
            $_SESSION["mensaje"] = "La contraseña es incorrecta, por favor verifique";
            $_SESSION["estado"] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $controlador = new controladorGestionarUsuario();
        $controlador->call_actualizar([
            "usuario" => $usuario,
            "pasword" => md5($contrasenia_1),
        ]);
    } else {
        include_once "../shared/formMensajeSistema.php";
        (new formMensajeSistema())->accesso_denegado();
    }
    exit;
}
?>
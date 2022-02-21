<?php
require_once("./arrayusers.php");
if (isset($_POST['enviar'])) {
    $acceso = 0;
    $usuario = $_POST['usuario'];
    if (acceso($usuario, $usuarios) == true) {
        if ($usuario == "MARIA") {
            if (!isset($_COOKIE['maria'])) {
                $usuarioautorizado = $usuario . "," . $acceso;
                setcookie('maria', $usuarioautorizado, time() + 60);
                header("location: principal.php");
            } else {
                $usuario = explode(",", $_COOKIE["maria"]);
                $usu = $usuario[0];
                $acceso = intval($usuario[1]) + 1;
                $usuarioautorizado = $usu . "," . $acceso;
                setcookie('maria', $usuarioautorizado, time() + 60);
                header("location: principal.php");
            }
        } elseif ($usuario == "LUIS") {
            if (!isset($_COOKIE['luis'])) {
                $usuarioautorizado = $usuario . "," . $acceso;
                setcookie('luis', $usuarioautorizado, time() + 60);
                header("location: principal.php");
            } else {
                $usuario = explode(",", $_COOKIE["luis"]);
                $usu = $usuario[0];
                $acceso = intval($usuario[1]) + 1;
                $usuarioautorizado = $usu . "," . $acceso;
                setcookie('luis', $usuarioautorizado, time() + 60);
                header("location: principal.php");
            }
        }
    } else {
        echo "Usuario no autorizado";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Login </title>
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;


            background-color: lightgoldenrodyellow;


        }

        h1 {
            border-bottom: dashed 2px darkgoldenrod;
            padding: 10px;
        }

        form {
            font-size: 1.5em;
        }

        #login {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        <br>
        <!--FORMULARIO -->
        <p align="center">
        <h1> Acesso resultado pruebas </h1>
        <form action="" method="post">
            Usuario: <input type="text" name="usuario" placeholder="Introduzca su Usuario" required> <br>
            <input id="login" type="submit" name="enviar" value="LOGIN">
        </form>
        </p>
    </main>
</body>

</html>
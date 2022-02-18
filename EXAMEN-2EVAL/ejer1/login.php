<?php
require_once("./arrayusers.php");
if (isset($_POST['enviar'])) {
    if (!isset($_COOKIE['usuariosautorizados'])) {
        $acceso = 1;
        $usuario = $_POST['usuario'];
        if ($usuario == $usuarios[0] || $usuario == $usuarios[1]) {
            $usuarioautorizado = $usuario;
            $usuarioautorizado = $usuarioautorizado . "," . $acceso . ";";

            setcookie('usuariosautorizados', $usuarioautorizado, time() + 60);
            header("location: principal.php");
        } else {
            echo "Usuario no autorizado";
        }
    } else {


        if (!empty($_POST['usuario'])) {
            $usuarioautorizado;
            $usuario = $_COOKIE["usuariosautorizados"];
            $usuarioyacces = explode(";", $usuario);
            foreach ($usuarioyacces as $usu) {
                $uya = explode(",", $usu);
                if ($uya[0] == $usuarios[0] || $uya[0] == $usuarios[1]) {
                    $usuarioautorizado = $uya[0];
                    $acceso = $uya[1] + 1;
                    $usuarioautorizado = $usuarioautorizado . "," . $acceso . ";";

                    setcookie('usuariosautorizados', $usuarioautorizado, time() + 60);
                    header("location: principal.php");
                } else {
                    echo "Usuario no autorizado";
                }
            }
        }
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
</Head>

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
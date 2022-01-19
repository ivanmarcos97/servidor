<?php
if (isset($_POST['enviar'])) {
    if (!isset($_COOKIE['login'])) {
        $usuario = $_POST['usuario'];
        $usuario .= "-" . $_POST['clave'] . ",";

        setcookie('login', $usuario, time() + 60);
        exit;
    } else {

        if ((!empty($_POST['usuario'])) && (!empty($_POST['clave']))) {
            $prueba = false;
            $usuactual = "";
            $usuario = $_COOKIE["login"];
            $usuarioYContraseña = explode(",", $usuario);
            foreach ($usuarioYContraseña as $uyc) {
                $uycseparados = explode("-", $uyc);

                for ($i = 0; $i < count($uycseparados); $i++) {
                    if ($_POST['usuario'] == $uycseparados[$i] && $_POST['clave'] == $uycseparados[$i + 1]) {
                        $prueba = true;
                        $usuactual = $uycseparados[$i];
                    }
                }
            }
            if ($prueba == true) {
                setcookie('login', $usuario, time() + 60);
                echo "Bienvenido de nuevo " . $usuactual;
            } else {
                $usuario .= $_POST['usuario'];
                $newusu = $_POST['usuario'];
                $usuario .= "-" . $_POST['clave'] . ",";
                setcookie('login', $usuario, time() + 60);
                echo "$newusu Te  has registrado con exito";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> SERIALIZACIÓN DE OBJETOS </title>
</Head>

<body>

    <br>
    <!--FORMULARIO -->
    <p align="center">
    <h2> credenciales del usuario </h2>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario">
        Contraseña: <input type="password" name="clave">
        <input type="submit" name="enviar" value="LOGIN">
    </form>
    </p>

</body>

</html>
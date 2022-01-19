<?php

if (!isset($_COOKIE['login'])) {
    $usuario = $_POST['usuario'];
    $usuario .= "-" . $_POST['clave'] . ",";

    setcookie('login', $usuario, time() + 60);
    exit;
} else	
	if (isset($_POST['enviar'])) {
    if ((!empty($_POST['usuario'])) && (!empty($_POST['clave']))) {
        $usuario = $_COOKIE["login"];
        $usuarioYContraseña=explode(",",$usuario);
        foreach($usuarioYContraseña as $uyc){
        $uyc=explode("-",$usuarioYContraseña[i])
        
    }
        if(){

        }
        $usuario .= $_POST['usuario'];
        $usuario .= "-" . $_POST['clave'] . ",";

        setcookie('login', $usuario, time() + 60);

        
    } else
        echo "Acceso denegado. Las credenciales no son correctas";
    exit;
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
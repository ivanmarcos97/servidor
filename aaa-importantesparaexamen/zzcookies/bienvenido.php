<?php
require_once("./funciones.php");
if (acceso($arr, $_POST["usuario"]) == true) {
    if (isset($_COOKIE['usuario'])) {
        $usu = explode(";", $_COOKIE["usuario"]);
        $primero = explode(",", $usu[0]);
        $segundo = explode(",", $usu[1]);

        if ($primero[0] == $_POST["usuario"]) {
            $primero[1]++;
            $usu = $primero[0] . "," . $primero[1] . ";" . $segundo[0] . "," . $segundo[1];
            setcookie('usuario', $usu, time() + 60);
            echo "Bienvenido de nuevo  " . $primero[0] . "<br>" . "Acceso: " . $primero[1];
        } else if ($segundo[0] == $_POST["usuario"]) {
            $segundo[1]++;
            $usu = $primero[0] . "," . $primero[1] . ";" . $segundo[0] . "," . $segundo[1];
            setcookie('usuario', $usu, time() + 60);
            echo "Bienvenido de nuevo  " . $segundo[0] . "<br>" . "Acceso: " . $segundo[1];
        }
    } else {

        $usu = $arr[0] . "," . "1" . ";" . $arr[1] . "," . "1";
        setcookie('usuario', $usu, time() + 60);
        echo "Bienvenido " . $_POST["usuario"];
    }
} else {
    echo "usuario no encontrado";
}

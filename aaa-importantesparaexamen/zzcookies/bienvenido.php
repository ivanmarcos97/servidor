<?php
require_once("./funciones.php");
if (acceso($arr, $_POST["usuario"]) == true) {
    if (isset($_COOKIE['usuario'])) {
        $usu = explode(";", $_COOKIE["usuario"]);
        $primero = explode(",", $usu[0]);
        $segundo = explode(",", $usu[1]);
        if ($_POST["usuario"] == $primero[0]) {


            if ($primero[1] != 0) {
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
                if ($_POST["usuario"] == $primero[0]) {
            }
        } else {
            if ($primero[1] == 0) {
                $primero[1]++;
                $usu = $primero[0] . "," . $primero[1] . ";" . $segundo[0] . "," . $segundo[1];
                setcookie('usuario', $usu, time() + 60);
                echo "Bienvenido   " . $primero[0] . "<br>";
            } else {
                $segundo[1]++;
                $usu = $primero[0] . "," . $primero[1] . ";" . $segundo[0] . "," . $segundo[1];
                setcookie('usuario', $usu, time() + 60);
                echo "Bienvenido   " . $segundo[0] . "<br>";
            }
        }
    } else {
        if ($arr[0] == $_POST["usuario"]) {
            $usu = $arr[0] . "," . "1" . ";" . $arr[1] . "," . "0";
        } elseif ($arr[1] == $_POST["usuario"]) {
            $usu = $arr[0] . "," . "0" . ";" . $arr[1] . "," . "1";
        }
        echo "Bienvenido " . $_POST["usuario"];
        setcookie('usuario', $usu, time() + 60);
    }
} else {
    echo "usuario no encontrado";
}

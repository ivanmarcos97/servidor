<?php
function valida_precio(&$pre, &$e)
{
    if (!empty($_POST["pre"])) {
        if (!filter_var($_POST["pre"], FILTER_VALIDATE_FLOAT) === false) {
            if (preg_match("/^[0-9]+.[0-9]{2}$/",$_POST["pre"] )) {
                $pre = $_POST["pre"];
            } else {
                $e = "Error. El dato debe ser positivo y debe tener dos decimales.";
            }
        } else {
            $e = "Error. Debe ser un numero decimal";
        }
    } else {
        $e = "Error. El dato esta vacio";
    }
}

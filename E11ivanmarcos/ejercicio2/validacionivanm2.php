<?php
function valida_precio(&$pre, &$e)
{
    if (!empty($_POST["pre"])) {
        if (!filter_var($_POST["pre"], FILTER_VALIDATE_INT) === false) {
            if ($_POST["pre"] >= 0 ) {
                $pre = $_POST["pre"];
            } else {
                $e = "Error. El dato debe ser positivo";
            }
        } else {
            $e = "Error. Debe ser un numero entero";
        }
    } else {
        $e = "Error. El dato esta vacio";
    }
}

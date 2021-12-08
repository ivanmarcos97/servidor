<?php

function micontrolador1($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = "No se puede dividir entre 0";
            echo "Error de advertencia: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = "No se puede usar una constante sin definir";
            echo "Error de aviso: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        default:
            echo "Error no identificado";
    }
}
function micontrolador2($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = " no se puede redefinir una constante";
            echo "Warning: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = "no se puede realizar la funcion";
            echo "Error de aviso $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        default:
            echo "Error sin identificar";
    }
}

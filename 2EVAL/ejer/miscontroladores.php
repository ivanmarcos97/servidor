<?php

function micontrolador1($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = "No se puede dividir entre 0";
            echo "Error de advertencia: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = "No se puede usar una variable sin definir";
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
            $mensaje = " error en el codigo";
            echo "Warning: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = " no se puede redefinir una constante";
            echo "Error de aviso $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        default:
            echo "Error sin identificar";
    }
}

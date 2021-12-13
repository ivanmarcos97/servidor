<?php
function micontroladorgeneral($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = "Advertencia";
            echo "Warning: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = " Error";
            echo "Notice: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        default:
            echo "Error sin identificar";
    }
}

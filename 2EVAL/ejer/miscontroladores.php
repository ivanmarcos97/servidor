<?php

function micontrolador1($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = "No se puede dividir entre 0";
            echo "Error de advertencia: $mensaje" . " " . $fichero . " " . " en la linea $linea";
            break;
        case E_NOTICE:
            $mensaje = "no se puede";
            echo "Error de aviso $mensaje" . " " . $fichero . " " . " en la linea $linea";
        default:
            echo "Error no identificado";
    }
}

<?php

function micontrolador1($nivel, $mensaje, $fichero, $linea)
{
    switch ($nivel) {
        case E_WARNING:
            $mensaje = "Error al declarar el array asociativo";
            echo "Error de Advertencia: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
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
            $mensaje = " Archivo no encontrado";
            echo "Warning: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        case E_NOTICE:
            $mensaje = " no se puede redefinir una constante";
            echo "Notice: $mensaje" . " " . $fichero . " " . " en la linea $linea <br>";
            break;
        default:
            echo "Error sin identificar";
    }
}

<?php
function Alumnado_total($datos)
{
    $alumnos = 0;
    foreach ($datos as $dato => $valor) {
        $alumnos = +$alumnos + $valor;
    }
    return $alumnos;
}
function centros($datos, $num)
{
    $centros = "";
    foreach ($datos as $centro => $valor) {
        if ($valor > $num) {
            $centros .= $centro . ";";
        }
    }

    return $centros;
}

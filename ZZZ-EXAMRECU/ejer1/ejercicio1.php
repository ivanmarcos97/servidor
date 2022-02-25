<?php
require_once("./funciones.php");
include("datos.inc");
$numeroAlumnos = 300;


echo "Alumnos totales: " . Alumnado_total($datos) . "<br>";


$centros = centros($datos, $numeroAlumnos);

$resultado = explode(";", $centros);

for ($i = 0; $i < count($resultado); $i++) {
    echo "<br>" . $resultado[$i] . "<br>";
}

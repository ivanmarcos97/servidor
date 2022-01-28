<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db = "ciclos";
$conexion = new mysqli($db_host, $db_usuario, $db_clave, $db);
if (!$conexion->connect_errno) {
    echo "Conexion establecida<br>";
} else {
    die("Error, no se encontro la db<br>");
}

$consulta = "SELECT nombre FROM alumno WHERE id_al=ANY(Select id_al from notas where id_mod='DWES' and cali>=5)";
$resultado = $conexion->query($consulta);
while ($fila = $resultado->fetch_array()) {
    echo $fila["nombre"] . '<br>';
}

$conexion->close();

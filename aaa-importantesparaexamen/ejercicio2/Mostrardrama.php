<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db = "cinema";
$conexion = new mysqli($db_host, $db_usuario, $db_clave, $db);
if (!$conexion->connect_errno) {
    echo "Conexion establecida<br>";
} else {
    die("Error, no se encontro la db<br>");
}




//mostrar peliculas genero drama
$sql = "SELECT titulo FROM peliculas WHERE genero='drama'";

$resultado = $conexion->query($sql);
while ($fila = $resultado->fetch_array()) {
    echo $fila["titulo"] . '<br>';
}




$conexion->close();

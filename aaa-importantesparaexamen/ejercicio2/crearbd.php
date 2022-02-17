<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db = "";
$conexion = new mysqli($db_host, $db_usuario, $db_clave);
if (!$conexion->connect_errno) {
    echo "Conexion establecida<br>";
} else {
    echo "Error en la conexion<br>";
}

$sql = "create database cinema";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La creacion de la base de datos es correcta<br>";
} else {
    echo "Error, la creacion no es posible<br>";
}
$conexion->close();

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

$conexion->autocommit(false);

$consulta = "insert into  modulo (id_mod,horas) values ('aw',4),('di',6),('ei',3)";
$resultado = $conexion->query($consulta);
if ($conexion->affected_rows < 2)
    $conexion->commit();
else
    $conexion->rollback();

$conexion->close();

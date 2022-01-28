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


$edad_ac = 18;
$edad_nu = 19;

$actuali = "update alumno set edad=? where edad=?";
$stmt = $conexion->prepare($actuali); //prepare devuelve un nobjeto se la clase stmt_result
$stmt->bind_param('ii', $edad_nu, $edad_ac);
$ok = $stmt->execute();
if ($ok)
    echo "actualizacion realizada";
else
    echo "la insercion no ha sido posible";

$conexion->close();

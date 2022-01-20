<?php

$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db_nombre = "ciclos";

$conexion = @mysqli_connect($db_host, $db_usuario, $db_clave);
if (mysqli_connect_errno()) {
    echo "Fallo en la conexi&#243n <br>";
    exit();
} else {
    echo "Conexi&#243n establecida <br>";
}

mysqli_select_db($conexion, $db_nombre) or die("No se encontro la base de datos");
echo "<table>";
$consulta = "select * from alumno";
$resultados = mysqli_query($conexion, $consulta);
while ($fila = mysqli_fetch_row($resultados))
    echo "<tr>" . "<td>" . $fila[0] . "</td>" . " " . "<td>" . $fila[1] . "</td>" . " " . "<td>" . $fila[2] . "</td>" . " " . "<td>" . $fila[3] . "</td>" . "</tr>";
echo "</table>";


echo "<table>";
$consulta = "select nombre,edad from alumno";
$resultados = mysqli_query($conexion, $consulta);
while ($fila = mysqli_fetch_row($resultados))
    echo "<tr>" . "<td>" . $fila[0] . "</td>" . " " . "<td>" . $fila[1] . "</td>" . "</tr>";
echo "</table>";
mysqli_close($conexion);

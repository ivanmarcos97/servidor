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


//////Insert
$id_al = 56;
$nombre = "ansu fati";
$edad = 20;
$id_curso = 2;
$consulta = "Insert into alumno(id_al,nombre,edad,id_curso) values ($id_al,'$nombre',$edad,$id_curso)";
$resultados = mysqli_query($conexion, $consulta);
if ($resultados)
    echo "insercion realizada";
else
    echo  mysqli_error($conexion);



//////Borrado

$consulta = "Delete from alumno where id_al=13";
$resultados = mysqli_query($conexion, $consulta);
if ($resultados)
    echo "borrado realizado con exito";
else
    echo  mysqli_error($conexion);



////////modificacion

$consulta = "update  alumno set id_al=1 where id_al=2";
$resultados = mysqli_query($conexion, $consulta);
if ($resultados)
    echo "Actualizacion realizada con exito";
else
    echo  mysqli_error($conexion);
mysqli_close($conexion);

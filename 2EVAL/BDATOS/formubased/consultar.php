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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            color: #318aac !important;
            font-size: 20px;
            font-weight: 500;
            padding: 0.5em 1.2em;
            background: rgba(0, 0, 0, 0);
            border: 2px solid;
            border-color: #318aac;
            transition: all 1s ease;
            position: relative;
        }

        input:hover {
            background: #318aac;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <?php




    echo "<table>";
    $consulta = "select * from alumno";
    $resultados = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_row($resultados))
        echo "<tr>" . "<td>" . $fila[0] . "</td>" . " " . "<td>" . $fila[1] . "</td>" . " " . "<td>" . $fila[2] . "</td>" . " " . "<td>" . $fila[3] . "</td>" . "</tr>";
    echo "</table>";





    mysqli_close($conexion);

    ?>


</body>

</html>
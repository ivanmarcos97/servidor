<?php

$db_host = "localhost";
$db_usuario = "id18421386_ivan1";
$db_clave = "Basededatos1/";
$db_nombre = "id18421386_ciclos";

$conexion = @mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre);
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


    if (isset($_POST["enviar"])) {
        $idnombre2 = $_POST["idnombre2"];
        $idnombre = $_POST["idnombre"];
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $curso = $_POST["curso"];
        if ((!empty($idnombre)) && (!empty($nombre)) && (!empty($edad)) && (!empty($curso))) {

            $consulta = "update  alumno set id_al=$idnombre2  ,nombre='$nombre',edad=$edad,id_curso=$curso  where id_al=$idnombre";
            $resultados = mysqli_query($conexion, $consulta);
            if ($resultados)
                echo "Actualizacion realizada con exito";
            else
                echo  mysqli_error($conexion);
            mysqli_close($conexion);
        }
    }
    ?>

    <form action="" method="post">
        id Del Alumno que quiere modificar: <input type="number" name="idnombre">
        <br>
        id Nombre: <input type="number" name="idnombre2">
        <br>
        Nuevo Nombre del alumno: <input type="text" name="nombre">
        <br>
        Nueva edad: <input type="number" name="edad">
        <br>
        Nuevo Id curso: <input type="number" name="curso" min="1" max="2">
        <br>
        <input type="submit" name="enviar">
    </form>



</body>

</html>
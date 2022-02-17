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
        $idnombre = $_POST["idnombre"];
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $curso = $_POST["curso"];
        if ((!empty($idnombre)) && (!empty($nombre)) && (!empty($edad)) && (!empty($curso))) {
            //////Insert

            $consulta = "Insert into alumno(id_al,nombre,edad,id_curso) values ($idnombre,'$nombre',$edad,$curso
            )";
            $resultados = mysqli_query($conexion, $consulta);
            if ($resultados)
                echo "insercion realizada";
            else
                echo  mysqli_error($conexion);




            mysqli_close($conexion);
        }
    }
    ?>

    <form action="" method="post">
        id Nombre: <input type="number" name="idnombre">
        <br>
        Nombre del alumno: <input type="text" name="nombre">
        <br>
        edad: <input type="number" name="edad">
        <br>
        Id curso: <input type="number" name="curso" min="1" max="2">
        <br>
        <input type="submit" name="enviar">
    </form>



</body>

</html>
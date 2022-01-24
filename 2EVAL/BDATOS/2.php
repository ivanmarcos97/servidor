<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";

$conexion = mysqli_connect($db_host, $db_usuario, $db_clave);
$ok = mysqli_select_db($conexion, "ciclos");
if ($ok) {
    echo "conexion estableccida";
} else {
    "Error en la activacion de la BD";
}




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
        ////////insert//////////////////////////////////
        $sql = "Insert into alumno(id_al,nombre,edad,id_curso) values (?,?,?,?)";
        $consulta = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($consulta, 'isii', $idnombre, $nombre, $edad, $curso);
        $ok = mysqli_stmt_execute($consulta);
        if ($ok) {
            echo "INSERCION CORRECTA";
        } else {
            "Error en la INSERCION" . mysqli_stmt_error($consulta);
        }


        ///////////////mostrar/////////////////////////

        mysqli_stmt_close($consulta);
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
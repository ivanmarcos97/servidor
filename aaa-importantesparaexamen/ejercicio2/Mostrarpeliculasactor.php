<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="actor">Actor:</label>
        <input type="text" name="actor" id="actor" />
        <input type="submit" value="Enviar" name="enviar" />
    </form>
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



    if (isset($_POST["enviar"])) {
        $actor = $_POST["actor"];

        if ((!empty($actor))) {
            //Mostrar en cuántas películas intervino un determinado actor? (se podrá teclear el nombre del actor)
            $sql = "SELECT count(titulo) FROM intervencion WHERE id_actor in (select id_actor from actores where nombre_apellidos='$actor')";

            $resultado = $conexion->query($sql);
            while ($fila = $resultado->fetch_array()) {
                if ($fila["count(titulo)"] == 1) {
                    echo " $actor ha participado en " . $fila["count(titulo)"] . " pelicula." . '<br>';
                } else {
                    echo " $actor ha participado en " . $fila["count(titulo)"] . " peliculas." . '<br>';
                }
            }




            $conexion->close();
        }
    }
    ?>
</body>

</html>
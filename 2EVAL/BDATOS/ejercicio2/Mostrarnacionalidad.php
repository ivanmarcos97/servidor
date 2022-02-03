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
        <label for="naci">Nacionalidad:</label>
        <select name="nacionalidad" id="naci">
            <option value="española">española</option>
            <option value="estadounidense">estadounidense</option>
            <option value="francés">francés</option>

        </select>
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
        $nacionalidad = $_POST["nacionalidad"];

        if ((!empty($nacionalidad))) {
            //Mostrar cuántos actores hay de una determinada nacionalidad (se podrá elegir desde un formulario la nacionalidad disponible)
            $sql = "SELECT count(nombre_apellidos) FROM actores WHERE nacionalidad='$nacionalidad'";

            $resultado = $conexion->query($sql);
            while ($fila = $resultado->fetch_array()) {
                if ($fila["count(nombre_apellidos)"] == 1) {
                    echo "Hay " . $fila["count(nombre_apellidos)"] . " actor de nacionalidad $nacionalidad." . '<br>';
                } else {
                    echo "Hay " . $fila["count(nombre_apellidos)"] . " actores de nacionalidad $nacionalidad." . '<br>';
                }
            }




            $conexion->close();
        }
    }
    ?>
</body>

</html>
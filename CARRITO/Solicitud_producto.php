<?php

if (!isset($_COOKIE["carro"])) {
    setcookie("carro", "1", time() + 300);
    if (isset($_POST['continuar'])) {
        if ((!empty($_POST['prod'])) && (!empty($_POST['unid']))) {
            $datos = $_POST['prod'] . $_POST['unid'];
        }
    }
} else {
    $contador = (int)$_COOKIE["visitas"];
    $contador++;
    echo "Este es tu " . $contador . " acceso";
    //actualizal cookie
    setcookie("visitas", $contador, time() + 300);
}




die("fin de la aplicación");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra-ME</title>
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        #boton {
            font-size: 2em;
            background-color: lightgreen;
            border: 2px solid black;
            border-radius: 10px;
            padding: 5px;
            text-decoration: none;
            color: black;
        }

        #boton:hover {
            border: 4px solid black;
        }
    </style>
</head>

<body>
    <form action="./finalizacion.php">
        <label for="prod">Producto:</label>
        <input type="text" id="prod" name="prod">
        <label for="unid">Unidades:</label>
        <input type="text" id="unid" name="unid"><br><br>
        <input type="submit" value="Continuar" id="boton">
    </form>
</body>

</html>
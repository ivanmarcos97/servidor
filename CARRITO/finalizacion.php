<?php

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

        a {
            font-size: 2em;
            background-color: lightblue;
            border: 2px solid black;
            border-radius: 10px;
            padding: 5px;
            text-decoration: none;
            color: black;
        }

        a:hover {
            border: 4px solid black;
        }
    </style>
</head>

<body>




    <table>
        <tr>
            <td>Denominación</td>
            <td>Unidades</td>
        </tr>

        <?php

        $prod =    $_COOKIE['productosel'];
        $unid =   $_COOKIE["unidadessel"];


        echo '<tr>';
        echo '<td>' . $prod . '</td>';
        echo '<td>' . $unid . '</td>';
        echo '</tr>';





        ?>


    </table>


    <a href="pago.php">Pagar</a>
    <a href="Solicitud_producto.php">Inicio</a>
    <a href="fin.php">Salir</a>

</body>

</html>
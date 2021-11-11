<?php
require_once("../../../../libreriaphp/calcu.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            color: blue;
        }




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
    <h3>Ejercicio 9</h3>
    <br>
    <?php
    echo calcu();
    ?>

    <form action="" method="post"><br>
        <label for="a">Introduce un operando:</label>
        <input type="text" name="ope1" id="a" required><br>
        <label for="b">Introduce un segundo operando:</label>
        <input type="text" name="ope2" id="b" required><br>
        <label for="c">Introduce un operador:</label>
        <input type="text" name="operador" id="c" required><br>
        <input type="submit" name="enviar" value="Enviar">


    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: auto;
            border: 1px solid black;
            width: 30%;
            height: 100px;
            text-align: center;
        }

        input {
            background-color: lightblue;
            display: flex;
            margin: auto;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <p>Segundo Script</p>
    <a href="Tercera.php"><input type="submit" value="Seguir"></a>

    <?php

    $num = $_COOKIE["resultado"];
    if ($num % 2 == 0) {
        $operacion = "SUMA";
    } else {
        $operacion = "RESTA";
    }
    $num = $num . ";" . $operacion;
    setcookie('resultado', $num, time() + 60);


    ?>
</body>

</html>
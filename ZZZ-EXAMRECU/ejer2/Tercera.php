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
<?php

$num = $_COOKIE["resultado"];
$final = explode(";", $num);
$numero = $final[0];
$operacion = $final[1];
if ($operacion == "SUMA") {
    $resultado = +$numero + 10;
} else {
    $resultado = +$numero - 10;
}

setcookie('resultado', $resultado, time() + 60);

?>

<body>
    <p>Tercer script </p>
    <p><?php echo "El número es el " . $numero . " y la operacion es la " . $operacion; ?></p>



</body>

</html>
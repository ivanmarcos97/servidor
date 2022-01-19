<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: lightgoldenrodyellow;
        }
    </style>
</head>

<body>


    <?php
    $totalco =   $_COOKIE['totalprod'];
    echo "<h3>Ha pagado un total de: " . $totalco . "€</h3>";
    $contador = 0;
    setcookie("productosel", "", time() - 1000);
    setcookie("unidadessel", "", time() - 1000);
    setcookie('totalprod', "", time() - 1000);
    die("Su compra se ha realizado con exito");
    ?>
</body>

</html>
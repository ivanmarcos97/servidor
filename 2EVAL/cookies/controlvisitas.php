<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>control visitas</h1>
    <?php
    if (!isset($_COOKIE["visitas"])) {
        setcookie("visitas", "1", time() + 300);
        echo "Bienvenido";
    } else {
        $contador = (int)$_COOKIE["visitas"];
        $contador++;
        echo "Este es tu " . $contador . " acceso";
        setcookie("visitas", $contador, time() + 300);
    }
    ?>
</body>

</html>
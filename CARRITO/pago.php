<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Pagina en mantenimiento</p>
</body>
<?php
$contador = 0;
setcookie("productosel", $contador, time() - 1000);
setcookie("unidadessel", $contador, time() - 1000);
die("fin de la aplicación");
?>

</html>
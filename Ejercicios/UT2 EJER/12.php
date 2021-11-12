<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dni=71303325;
    $letras=array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
    function calcularLetradni($dni){
        return $dni-((int)($dni/23)*23);

    }
    echo $dni.$letras[calcularLetradni($dni)];
    ?>
</body>
</html>
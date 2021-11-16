<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        include('./datos.inc');
        function mas10($valor){
            $sum=$valor - 10;
            if($sum < 0){
                die();
            }
            echo $valor , "-", 10, " = ";
            echo $sum;
        }
        mas10(NUMERO);
    ?>
</body>
</html>
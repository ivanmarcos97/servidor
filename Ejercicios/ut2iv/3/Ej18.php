<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>
<body>
    <?php
        function edad($año ,$mes, $dia){
            $segundosUnix = mktime(0,0,0,$mes,$dia,$año);
            $segundosV = time() - $segundosUnix;
            $edad = $segundosV/60/60/24/365.25;
            echo "Edad: ", (integer)$edad, " años.";
        }
        edad(1999,8,17);
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function calculoedad($año,$mes,$dia){
        $segundosUnix=mktime(0,0,0,$mes,$dia,$año);
        $segundosV=time()-$segundosUnix;
        $edad=$segundosV/60/60/24/365.25;
        echo "Edad: ", (integer)$edad, "años. ";
    }
    calculoedad(1997,11,20);
    ?>
</body>
</html>
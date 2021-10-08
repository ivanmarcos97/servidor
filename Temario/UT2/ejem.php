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
$lectivos=array("otoño"=>60,"invierno"=>61,"primavera"=>57,"verano"=>7);
$menosdias=300;

foreach($lectivos as $clave=>$valor)
        if($valor<$menosdias)
        {
            $menosdias=$valor;
            $estmenosdias=$clave;
        }
        echo "la estacion menos lectiva es $estmenosdias y tiene $menosdias dias lectivos"
    ?>
</body>
</html>
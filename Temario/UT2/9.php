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
    $alumnos=array("m1"=>array(7,5),
    "m2"=>array(8,9),"m3"=>array(9,6),
    "m4"=>array(8,9),"m5"=>array(8,6));

    foreach($alumnos as $matriculas=>$valor){
        foreach($valor as $notas){
        echo "$matriculas $notas";
    }}
 
 ?>
</body>
</html>
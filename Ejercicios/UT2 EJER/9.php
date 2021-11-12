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
    $alumnos=array('123'=>array('1eval'=>6,'2eval'=>8),
                    '970'=>array('1eval'=>8,'2eval'=>7),
                    '754'=>array('1eval'=>7,'2eval'=>9),
                    '435'=>array('1eval'=>9,'2eval'=>8),
                    '125'=>array('1eval'=>9,'2eval'=>7));

    foreach($alumnos as $matriculas=>$valor){
        foreach($valor as $notas){
        echo "$matriculas $notas";
    }}
 
 ?>
</body>
</html>
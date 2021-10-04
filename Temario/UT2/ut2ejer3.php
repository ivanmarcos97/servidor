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
$filas = 4;
$simb=0;
for($i=0;$i<$filas;$i++){
for($y=-1;$y<$i;$y++){
    $simb++;
    echo "$simb";
}
echo "<br/>";
}
    ?>
</body>
</html>
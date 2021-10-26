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
$num=9;
$fact=$num;
$iant=0;
$i=$num;
for(;$i>0;$i--){ 
    $iant=$i;
    $fact=$fact*$iant;
  
} 
$fact=$fact/$num;
echo "el factorial de $num es= $fact "

    ?>
</body>
</html>
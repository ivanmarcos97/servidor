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
$uno=34;
$dos=56;
$tres=57;
echo "$uno $dos $tres";
if($uno>$dos && $uno>$tres){
    echo "$uno es el mayor";
}elseif($dos>$uno && $dos>$tres){
        echo "$dos es el mayor";
    }else{
        echo "$tres es el mayor";}
    ?>
</body>
</html>
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
        $act=array("Antonio Banderas"=>array("Dolor y gloria","La piel que habito"),
                   "Brad Pitt"=>array("Erase una vez ...... Hollywood"),
                   "Lura Dern"=>array("Historia de un matrimonio"));
 foreach($act as $as=>$actor){
     foreach($actor as $pelicula){
     echo " $pelicula ";
     echo "<ul>";
     }
     }

 
 ?>
</body>
</html>
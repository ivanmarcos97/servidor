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
 $uno="piedra";
 $dos="piedra";
 echo "jugador 1: $uno vs jugador 2: $dos <br/>";
 if($uno==$dos){
     echo "empate ,se repite ";
    }elseif($uno=="piedra" && $dos=="tijeras"){
     echo "Gana jugador 1";
    }elseif($dos=="piedra" && $uno=="tijeras"){
    echo "Gana jugador 2";
    }elseif($uno=="piedra" && $dos=="papel"){
    echo "Gana jugador 2";
    }elseif($dos=="piedra" && $uno=="papel"){
    echo "Gana jugador 1";
    }elseif($uno=="papel" && $dos=="tijeras"){
    echo "Gana jugador 2";
    }elseif($dos=="papel" && $uno=="tijeras"){
    echo "Gana jugador 1";
}
    ?>
</body>
</html>
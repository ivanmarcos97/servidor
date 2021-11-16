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
    //a
        function aleatorio(){
            $n=rand(1,6);
            if($n==6){
                echo("Enhorabuena es un $n.<br>");
            }else{
                echo ("Es un $n.<br>");
            }
        }
       //aleatorio();

    //b

        $jugar='aleatorio';
        $jugar();

    //c
        $funcion_aleatoria=function(){
            $n=rand(1,6);
            if($n==6){
                echo("Enhorabuena es un $n.<br>");
            }else{
                echo ("Es un $n.<br>");
            }    
        }
        $funcion_aleatoria();
    ?>
</body>
</html>
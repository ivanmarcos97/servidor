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
        function dado(){
            $n=rand(1,6);
            if($n==6){
                echo "¡enhorabuena! el valor obtenido es $n";
                }else{
                echo "El valor obtenido es $n"; 
            
            }
        }
        dado();
    ?>
</body>
</html>
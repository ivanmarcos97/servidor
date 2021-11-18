<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr{border:solid 2px black;}
    </style>
</head>
<body>
    <?php
        function multiplicar($m){
            for($i=0;$i<=10;$i++){
                $resultado=$m*$i;
                echo "<table>";
                echo "<tr>$m "." x "." $i ". "=" ." $resultado <tr/><br/>";
                
            }
            echo "<table/>";
        }
        
        multiplicar(3);
        multiplicar(4);
        multiplicar(5);
    ?>
</body>
</html>
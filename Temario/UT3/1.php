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
        include("./datos.inc");
        function suma($b){
         $mas=$b + 10;
         echo "$b"." + ". "10" . "=" . "$mas";
          }
          
          suma(num);
    ?>
</body>
</html>
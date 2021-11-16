<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>
<body>
    <?php
        function navidaden(){
            date_default_timezone_get("Europe/Madrid");
            $navidad = mktime(0,0,0,12,25,2021);
            $hoy=mktime(0,0,0,date("m"),date("d"),date("Y"));
            $dif = $navidad-$hoy;
            if(($dif%86400)!=0){
                $dias=(int) ($dif%86400)+1;
            }else{
                $dias =(int)($dif/86400);
            }
            return $dias;
        }
        navidaden();
    ?>
</body>
</html>
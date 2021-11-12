<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $plataforma = array("WAMP"=>array("Windows","Apache","MySQL","PHP"),
                            "XAMPP"=>array("LINUX o WINDOWS","Apache","MySQL O MariaDB","Php","Perl"),
                            "WISA"=>array("Windows","Internet informacion services","SQL server","ASP"),
                            "LAMP"=>array("LINUX ","Apache","MySQL","Php",),
                            "WIMP"=>array("Windows","Internet informacion services","MySQL","Php",));

        foreach($plataforma as $wx=>$valor){
            foreach($valor as $valores){
            if($valores=="Apache"){
                echo "$wx utiliza el servidor Apache <br/>";
            }
        }
        }
    ?>
</body>
</html>
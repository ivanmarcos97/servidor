<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
    <?php
    $array = array("LAMP" => array("Linux","Apache","My SQL","PHP, Perl, Python",),
                   "WISA" => array("Windows","IIS","SQL Server","ASP"),
                   "XAMPP" => array("Linux o Windows","Apache","My SQL o MariaDB","PHP y Perl"),
                   "WAMP" => array("Windows","Apache","My SQL","PHP",),
                   "WIMP" => array("Windows","IIS","My SQL","PHP"));
    
    foreach($array as $key => $tipo){
        if($tipo[1] == "Apache"){
            echo $key."<br>";
        }
    }
    ?>
</body>
</html>
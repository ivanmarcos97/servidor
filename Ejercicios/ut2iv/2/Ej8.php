<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej8 </title>
</head>
<body>
<h1><center>Ejercicio 8</center></h1>
<br>
<br>
<?php
	$peliculas = array("Antonio Bnaderas"=>array("Dolor y Gloria","La piel que habito"),
                        "Brad Pitt" => array("Era se una vez...Hollywood"),
                        "Laura Dern" => array("Historia de un matrimonio"));
    
    foreach($peliculas as $nombre => $valor){
        if($nombre == "Antonio Bnaderas"){
            echo "<b>$nombre:</b>", "<br>";
            foreach($valor as $pelicula){
                echo "$pelicula <br>";
            }
        }
    }
    echo "<br><br><br>";
    foreach($peliculas as $nombre => $valor){
        echo "<b>$nombre:</b>", "<br>";
        foreach($valor as $pelicula){
            echo $pelicula, "<br>";
        }
        echo "<br>";
    }
?>
<br>
</html>
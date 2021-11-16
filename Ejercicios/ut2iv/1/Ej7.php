<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej7 </title>
</head>
<body>
<h1><center>Ejercicio 7</center></h1>
<br>
<br>
<?php
	$jug1 = "Tijera";
	$jug2 = "Piedra";
	
	if ($jug1 == "Piedra" && $jug2 == "Tijeras"){
		echo "Gana el jugador 1, ","$jug1"," gana a ","$jug2";
		
	}else if ($jug1 == "Piedra" && $jug2 == "Papel"){
		echo "Gana el jugador 2, ","$jug2"," gana a ","$jug1";
		
	}else if ($jug1 == "Piedra" && $jug2 == "Piedra"){
		echo "Empate";
		
	}else if ($jug1 == "Papel" && $jug2 == "Piedra"){
		echo "Gana el jugador 1, ","$jug1"," gana a ","$jug2";
		
	}else if ($jug1 == "Papel" && $jug2 == "Tijera"){
		echo "Gana el jugador 2, ","$jug2"," gana a ","$jug1";
		
	}else if ($jug1 == "Papel" && $jug2 == "Papel"){
		echo "Empate";
		
	}else if ($jug1 == "Tijera" && $jug2 == "Piedra"){
		echo "Gana el jugador 2, ","$jug2"," gana a ","$jug1";
		
	}else if ($jug1 == "Tijera" && $jug2 == "Papel"){
		echo "Gana el jugador 1, ","$jug1"," gana a ","$jug2";
		
	}else if ($jug1 == "Tijera" && $jug2 == "Tijera"){
		echo "Empate";
	}
?>
<br>
</html>
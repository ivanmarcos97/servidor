<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej6 </title>
</head>
<body>
<h1><center>Ejercicio 6</center></h1>
<br>
<br>
<?php
//80010
	$cantidad = 1773;
	$bill100 = 0;
	$bill50 = 0;
	$bill20 = 0;
	$bill10 = 0;
	$bill5 = 0;
	$mon50 = 0;
	$mon20 = 0;
	$mon10 = 0;
	$mon5 = 0;
	$mon2 = 0;
	$mon1 = 0;
	
	if ($cantidad < 0){
		echo "Error cantidad negativa";
	}
	
		$bill100 = (int)($cantidad/10000);
		echo "Billetes de 100 -> ",$bill100,"<br>";
		$cantidad -= 10000*$bill100;
	
	
		$bill50 = (int)($cantidad/5000);
		echo "Billetes de 50 -> ",$bill50,"<br>";
		$cantidad -= 5000*$bill50;
	
	
		$bill20 = (int)($cantidad/2000);
		echo "Billetes de 20 -> ",$bill20,"<br>";
		$cantidad -= 2000*$bill100;
	
	
		$bill10 = (int)($cantidad/1000);
		echo "Billetes de 10 -> ",$bill10,"<br>";
		$cantidad -= 1000*$bill10;
	
	
		$bill5 = (int)($cantidad/500);
		echo "Billetes de 5 -> ",$bill5,"<br>";
		$cantidad -= 500*$bill5;
	
	
		$mon50 = (int)($cantidad/50);
		echo "Monedas de 50 -> ",$mon50,"<br>";
		$cantidad -= 50*$mon50;
	
	
		$mon20 = (int)($cantidad/20);
		echo "Monedas de 20 -> ",$mon20,"<br>";
		$cantidad -= 20*$mon20;
	
	
		$mon10 = (int)($cantidad/10);
		echo "Monedas de 10 -> ",$mon10,"<br>";
		$cantidad -= 10*$mon10;
	
	
		$mon5 = (int)($cantidad/5);
		echo "Monedas de 5 -> ",$mon5,"<br>";
		$cantidad -= 5*$mon5;
	
	
		$mon2 = (int)($cantidad/2);
		echo "Monedas de 2 -> ",$mon2,"<br>";
		$cantidad -= 2*$mon2;
	
	
		$mon1 = (int)($cantidad/1);
		echo "Monedas de 1 -> ",$mon1,"<br>";
		$cantidad -= 1*$mon1;
	
?>
<br>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej10 </title>
</head>
<body>
<h1><center>Ejercicio 10</center></h1>
<br>
<br>
<?php
	$a = 2;
	$b = 2;
	$c = 2;
	
	if($a == $b && $a == $c){
		echo "Es un triangulo equilatero de lado ", $a;
	}else if ($a == $b || $a == $c || $b == $c){
		echo "Es un triangulo isosceles";
	}else{
		echo "Es un triangulo escaleno";
	}
?>
<br>
</html>
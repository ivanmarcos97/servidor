<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej15 </title>
</head>
<body>
<h1><center>Ejercicio 15</center></h1>
<br>
<br>
<?php
	$año=1999;
	$mes=8;
	$dia=17;
	$suma=$año+$mes+$dia;
	while($suma>10){
		$nuevasuma=0;
		while ((int($suma/10)!= 0){
			$nuevasuma += ($suma % 10);
			$suma = (int)($suma / 10);
		}
		$nuevasuma+=($suma%10);
		$suma=$nuevasuma;
	}
	echo "El número de tarot es el $suma";
?>
<br>
</html>
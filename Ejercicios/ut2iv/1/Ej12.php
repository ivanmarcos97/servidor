<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej12 </title>
</head>
<body>
<h1><center>Ejercicio 12</center></h1>
<br>
<br>
<?php
	$num = 23;
	$esPrimo = "";
	for($i = 2 ; $i < $num ; $i++){
		if ($num % $i == 0){
			$i = $num+1;
			$esPrimo = "no";
			echo "No es Primo";
		}
	}
	if ($esPrimo != "no"){
		echo "Es primo";
	}
	
?>
<br>
</html>
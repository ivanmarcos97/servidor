<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej13 </title>
</head>
<body>
<h1><center>Ejercicio 13</center></h1>
<br>
<br>
<?php
	$num= 334;
	if ($num >= 100 && $num <= 999){
		$cociente = (int)($num/100);
		$resto = $num % 10;
		if ($cociente == $resto){
			echo "$num es capicúa";
		}else echo "$num no es capicúa";
	}else echo "Números de 3 cifras."
?>
<br>
</html>
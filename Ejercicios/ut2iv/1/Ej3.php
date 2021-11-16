<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej3 </title>
</head>
<body>
<h1><center>Ejercicio 3</center></h1>
<br>
<br>
<?php
	$num = 0;
	$max = 4;
	for ($i = 0; $i < $max; $i++){
		for($y = 0; $y <= $i; $y++){
			$num++;
			echo "$num ";
		}
		echo "<br>";
	}
?>
<br>
</html>
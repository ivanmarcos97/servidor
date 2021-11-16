<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej5 </title>
</head>
<body>
<h1><center>Ejercicio 5</center></h1>
<br>
<br>
<?php
	$num = 0;
	for ($i = 0; $i <= 100; $i++){
		if ($i % 10 != 3){
			$num+=$i;
		}
	}
	echo "$num";
?>
<br>
</html>
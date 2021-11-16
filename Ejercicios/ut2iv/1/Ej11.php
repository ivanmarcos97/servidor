<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej11 </title>
</head>
<body>
<h1><center>Ejercicio 11</center></h1>
<br>
<br>
<?php
											//EXAMEN CASI SEGUR0!!!!
	$num = 5; 
	$factorial = 1;
	if($num >= 2){
		for($i = 1; $i <= $num;$i++){
			$factorial = $factorial * $i;
		}
	}
	echo $factorial;
?>
<br>
</html>
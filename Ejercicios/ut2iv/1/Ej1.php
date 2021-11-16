<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej1 </title>
</head>
<body>
<h1><center>Ejercicio 1</center></h1>
<br>
<br>
<?php
	$num1 = 2;
	$num2 = 1;
	$num3 = 3;
	if ($num1 >= $num2 && $num1 >= $num3){
		echo "$num1";
	}else if($num2 >= $num3){
		echo "$num2";
	}else{
		echo "$num3";
	}
?>
<br>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej9 </title>
</head>
<body>
<h1><center>Ejercicio 9</center></h1>
<br>
<br>
<?php
	
	$num1 = 3;
	$num2 = 2;
	$num3 = 3;
	if ($num1 > $num2 && $num1 > $num3){
		echo "num1 ","$num1";
	}else if($num1 == $num2 && $num1 > $num3){
		echo "num1 y num2 ","$num1";
	}else if($num1 > $num2 && $num1 == $num3){
		echo "num1 y num3 ","$num1";
	}else if($num2 > $num1 && $num2 > $num3){
		echo "num2 ","$num2"; 
	}else if($num2 > $num1 && $num2 == $num3){
		echo "num2 y num3 ","$num2";
	}else if($num3 > $num1 && $num3 > $num2){
		echo "num3 ","$num3";
	}else{
		echo "Los tres son iguales ", "$num1";
	}
	
?>
<br>
</html>
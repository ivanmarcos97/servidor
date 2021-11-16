<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej2 </title>
</head>
<body>
<h1><center>Ejercicio 2</center></h1>
<br>
<br>
<?php
	$lectivos=array("otoño"=>60,"invierno"=>51,"primavera"=>57,"verano"=>7,);
	$menosdias=300;
	foreach($lectivos as $clave => $valor)
		if($valor < $menosdias){
			$menosdias=$valor;
			$estacion=$clave;
		}
	echo "Le estación con menos dias lectivos es $estacion"
?>
<br>
</html>
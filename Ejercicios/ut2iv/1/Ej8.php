<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej8 </title>
</head>
<body>
<h1><center>Ejercicio 8</center></h1>
<br>
<br>
<?php
	$colillas = 13;
	While($colillas >= 7){
		$cigarros += (int)($colillas/7);
		$colillas -= 7*$cigarros;
		$colillas += $cigarros;
	}
	echo "$cigarros"," cigars conseguidos.<br>";
	echo "$colillas"," colillas te quedan.";
?>
<br>
</html>
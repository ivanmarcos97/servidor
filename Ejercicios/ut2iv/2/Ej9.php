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
	$alumnos = array("alumno1"=>array("numMatricula"=>"001","1Eva"=>10,"2Eva"=>9),
					"alumno2"=>array("numMatricula"=>"002","1Eva"=>8.5,"2Eva"=>9.5),
					"alumno3"=>array("numMatricula"=>"003","1Eva"=>9.5,"2Eva"=>9),
					"alumno4"=>array("numMatricula"=>"004","1Eva"=>8,"2Eva"=>10),
					"alumno5"=>array("numMatricula"=>"005","1Eva"=>10,"2Eva"=>10));

//a
	$dato1=0;
	$dato2=0;
	foreach($alumnos as $alumno => $valores){
		echo "<b>$alumno:</b> <br>";
		foreach($valores as $clave => $dato){
			if($clave == "numMatricula"){
				echo "Matricula: $dato <br>";
			}
			if($clave == "1Eva"){
				$dato1 = $dato;
			}
			if($clave == "2Eva"){
				$dato2 = $dato;
			}
			$media = ($dato1 + $dato2)/2;	
		}
		
		echo "Media: $media <br>";
		echo "<br>";
	}
	
	echo ("<br><br><br>b)<br>");
//b
	$dato1=0;
	$dato2=0;
	$mediamax = 0;
	$matricula = "";
	foreach($alumnos as $alumno => $valores){
		foreach($valores as $clave => $dato){
			if($clave == "numMatricula"){
				$matriculaActual = $dato;
			}
			if($clave == "1Eva"){
				$dato1 = $dato;
			}
			if($clave == "2Eva"){
				$dato2 = $dato;
			}
			$media = ($dato1 + $dato2)/2;
			if($media > $mediamax){
				$mediamax =$media;
				$matricula = $matriculaActual;
			}
		}
		
	}
	echo "La media maxima: $mediamax <br> Matricula: $matricula";
?>
<br>
</html>
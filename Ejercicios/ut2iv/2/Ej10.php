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
	$alumnos = array("FP BASICA"=>array(10,0,0),
					"SMR"=>array(2,40,15),
					"ASIR"=>array(0,40,0),
					"DAW"=>array(0,30,0),
					"DAM"=>array(0,35,5));
	$resul="";

	function solo18_22($alum,&$resul){
		$resul="";
		$situacion=false;
		foreach($alum as $ciclo => $numAlumnos){
			if ($numAlumnos[1] <> 0 && $numAlumnos[0]==0 && $numAlumnos[2]==0){
				$resul.=$ciclo." ";
				$situacion = true;
			}
			return $situacion;
		}
	}
	
	if (solo18_22($alumnos,$resul)){
		echo "Ciclos con alumnos entre 18 y 22 años: ".$resul."<br>";
	}else{
		echo "No hay ciclos con alumnos entre 18 y 22 años";
	}
	
?>
<br>
</html>